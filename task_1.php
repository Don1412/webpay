<?php
/**
 * Created by PhpStorm.
 * User: don
 * Date: 26.07.18
 * Time: 23:30
 */

class task_1
{
    private $arr;

    public function __construct()
    {
        $this->arr = [
            ['id' => 1, 'data' => ['sort' => 3], 'type' => 101, 'val' => '1600000001.60085'],
            ['id' => 2, 'data' => ['sort' => 4], 'type' => 321, 'val' => '1000060000.95275'],
            ['id' => 3, 'data' => ['sort' => 1], 'type' => 210, 'val' => '2050000047.31715'],
            ['id' => 4, 'data' => ['sort' => 5], 'type' => 764, 'val' => '3200000000.46325'],
            ['id' => 5, 'data' => ['sort' => 2], 'type' => 357, 'val' => '2146763220.81125']
        ];
    }

    public function a()
    {
        $result = 0;
        foreach ($this->arr as $item) {
            $result += $item['val'];
        }
        return $result;
    }

    public function b()
    {
        $data = array_column($this->arr, 'data');
        array_multisort($data, SORT_ASC, $this->arr);
        return print_r($this->arr, true);
    }

    public function c()
    {
        for($i = 0; $i < count($this->arr); $i++)
        {
            if($this->arr[$i]['type'] % 100 == 1) {
                $this->arr[$i]['group'] = "a";
            }
            else if(preg_match('/^3[2,6]/', $this->arr[$i]['type'])) {
                $this->arr[$i]['group'] = "b";
            }
            else if(preg_match('/^3[0-1,3-5,7-9]/', $this->arr[$i]['type'])) {
                $this->arr[$i]['group'] = "c";
            }
            else {
                $this->arr[$i]['group'] = "d";
            }
        }
        return print_r($this->arr, true);
    }
}