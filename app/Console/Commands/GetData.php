<?php

namespace App\Console\Commands;

use App\CarData;
use Illuminate\Console\Command;

class GetData extends Command
{
    const MAX_COUNT = 100;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Data to Database';

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
        // データ取得用URLを設定
        $url = env('API_URL');

        // データ件数を取得
        $result = $this->xmlToJson($url);
        $total_count = $result['results_available'];

        // データ登録
        for ($i = 1; $i < $total_count; $i = $i + self::MAX_COUNT) {
            $data = $this->xmlToJson($url, $i, self::MAX_COUNT);

            foreach ($data['usedcar'] as $value) {

                $car_data = new CarData;

                $car_data->name = $value['model'];
                $car_data->grade = $value['grade'];
                $car_data->year = $value['year'];
                $car_data->odd = $value['odd'];

                // 価格が「応談」の場合は登録しない
                if (is_numeric($value['price']))
                    $car_data->price = $value['price'];

                $car_data->pref = $value['shop']['pref']['name'];
                $car_data->data_id = $value['id'];
                $car_data->color = $value['color'];
                $car_data->photo_url = $value['photo']['main']['s'];

                $car_data->save();
            }
        }
    }

    /**
     * XMLデータを配列に変換
     *
     * @param $url
     * @param integer $start
     * @param integer $count
     * @return mixed
     */
    private function xmlToJson($url, $start = 1, $count = 1)
    {
        $url = $url . "&start={$start}&count={$count}";
        $xml = simplexml_load_file($url);
        $json = json_encode($xml);
        $result = json_decode($json, true);

        return $result;
    }
}
