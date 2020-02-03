<?php

namespace App\Console\Commands;

use App\Setting;
use App\Transaction;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ScanBlocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:blocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $is_scanned = false;
        $setting_key = 'eth_last_block_count';
//      Get Block Count
        $counted_block = getBlockCount();

//      Get Last Request Block Count
        $setting_block_count = Setting::where('key', $setting_key)->first();
        $last_block_count = !empty($setting_block_count) ? (int) $setting_block_count['value'] : null;

//      Get Wallets
        $wallets = User::all();
        $this->addresses = $wallets->pluck('address')->toArray();

//      Compare last request with new request (Get Block Count)
        if (empty($last_block_count)) {
            $is_scanned = $this->scan($counted_block);
        } elseif (!empty($last_block_count) && $last_block_count < $counted_block) {
            foreach (range($last_block_count, $counted_block) as $block_count) {
                $is_scanned = $this->scan($block_count);

                if (!$is_scanned) {
                    break;
                }
            }
        }

        if ($is_scanned) {
            if (empty($setting_block_count)) {
                $setting_block_count = new Setting();
            }

            $setting_block_count->fill(['key' => $setting_key, 'value' => $counted_block]);
            $setting_block_count->save();
        }
    }

    private function scan($counted_block)
    {
        if ($block = getBlock($counted_block)) {
            if (!empty($block['transactions'])) {
                foreach ($block['transactions'] as $tx) {

                    $amount = $tx['value'];
                    $amount = $amount/1000000;
                    $amount = $amount/1000000;
                    $amount = $amount/1000000;

                    $to_address = $tx['to'];
                    $from_address = $tx['from'];

                    if (in_array($to_address, $this->addresses)) {
                        $postdata = [
                            'address' => $to_address,
                            'from'=>$from_address,
                            'value' => $amount,
                            'transaction_hash' => $tx['hash'],
                        ];

                        $this->updateBalances($postdata);
                    }
                }
            }

            return true;
        }

        return false;
    }

    private function updateBalances($postdata)
    {
        DB::transaction(function ()use($postdata) {
            $usr = User::where('address', $postdata['address'])->first();
            $usr->balance += $postdata['value'];
            $usr->save();

            $tx2 = new Transaction();
            $tx2->user_id = $usr->id;
            $tx2->type = Transaction::TYPE_RECEIVE;
            $tx2->address = $postdata['from'];
            $tx2->amount = $postdata['value'];
            $tx2->txid = $postdata['transaction_hash'];
            $tx2->save();
        });
    }

}
