<?php

namespace Database\Seeders;

use App\Models\Category;
use App\ValueConsts\CategoryConstant;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $plantCategoryIds = array();
    private $animalCategoryIds = array();

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $this->createPlantParentCategories();
        $this->createParentAnimalCategories();
        $this->createPlantChildCategories();
        $this->createChildAnimalCategories();
    }

    /**
     * Create parent categories of plants
     * @return void
     */
    private function createPlantParentCategories()
    {
        $plantCategories = [
            // 'Cây công nghiệp dài ngày',
            // 'Cây công nghiệp ngắn ngày',
            'Cây lương thực',
            'Cây ăn quả',
            'Cây rau màu',
            'Cây cảnh, hoa cảnh',
            'Cây thuốc, dược liệu',
            // 'Cây lâm nghiệp',
        ];

        foreach ($plantCategories as $key => $value) {
            $category = Category::create([
                'name' => $value,
                'type' => CategoryConstant::TYPE_PLANT,
                'parent_id' => 0,
            ]);

            $this->plantCategoryIds += [$key => $category->id];
        }
    }

    /**
     * Create parent categories of plants
     * @return void
     */
    private function createParentAnimalCategories()
    {
        $data = ['gia súc', 'gia cầm', 'côn trùng'];

        foreach ($data as $key => $value) {
            $category = Category::create([
                'name' => $value,
                'type' => CategoryConstant::TYPE_ANIMAL,
                'parent_id' => 0,
            ]);

            $this->animalCategoryIds += [$key => $category->id];
        }
    }

    /**
     * Create child categories of plants
     * @return void
     */
    private function createPlantChildCategories()
    {
        $data = [
            // Cây lương thực
            ['lúa', 'ngô', 'khoai tây', 'khoai lang', 'diêm mạch', 'sắn', 'yến mạch', 'cao lương'],

            // Cây ăn quả
            ['bưởi', 'cam', 'thanh long', 'xoài', 'táo ta', 'bơ', 'chôm chôm', 'sầu riêng', 'măng cụt', 'chanh dây', 'ổi', 'chanh', 'vải', 'nhãn', 'chuối', 'nho', 'mận', 'na', 'mít', 'táo đỏ', 'vú sữa', 'lê', 'sơ-ri', 'chay', 'kiwi', 'mắc cọp'],

            // Cây rau màu
            ['cà chua', 'ớt', 'dưa chuột', 'bắp cải', 'dưa hấu', 'tỏi', 'rau cải', 'mồng tơi', 'xà lách', 'hành lá', 'dưa lê', 'dâu tây', 'gấc', 'rau mùi', 'bí xanh', 'su hào', 'súp lơ', 'hành tây', 'măng tây', 'mướp đắng', 'rau ngót', 'rau chân vịt'],

            // Cây cảnh, hoa cảnh
            ['quất', 'đào', 'phật thủ', 'cần thăng', 'du', 'sanh', 'mai chiếu thủy', 'lan', 'hoa mai vàng', 'hoa huệ', 'hoa hồng', 'hoa cúc', 'hoa đồng tiền', 'hoa lay-ơn', 'hoa sen', 'hoa sứ', 'kim tiền', 'hoa cúc sao nhái', 'cát đằng', 'hoa huỳnh đệ', 'hoa giấy', 'dạ yến thảo', 'đậu biếc', 'hoa lồng đèn', 'hoa ly', 'hoa cát tường', 'sung', 'thiết mộc lan', 'hoa thược dược', 'hoa trà'],

            // Cây thuốc, dược liệu
            ['chùm ngây', 'ô liu', 'đinh lăng', 'ba kích', 'cà gai leo', 'chó đẻ', 'sâm ngọc linh', 'trinh nữ hoàng cung', 'hà thủ ô đỏ', 'hà thủ ô trắng', 'mã đề', 'thảo quả', 'rau đắng', 'bạc hà', 'địa hoàng', 'cỏ ngọt', 'đương quy', 'sa nhân tím', 'bời lời', 'xạ đen', 'giảo cổ lam', 'bồ công anh', 'nhân trần', 'lá lốt', 'atiso đỏ', 'kim tiền thảo', 'nghệ đen', 'bồ kết', 'lá vối', 'nhọ nồi', 'dâm dương hoắc', 'húng chanh'],

        ];

        foreach ($data as $key => $subData) {
            foreach ($subData as $subKey => $subValue) {
                Category::create([
                    'name' => $subValue,
                    'type' => CategoryConstant::TYPE_PLANT,
                    'parent_id' => $this->plantCategoryIds[$key],
                ]);
            }
        }
    }

    /**
     * Create child categories of plants
     * @return void
     */
    private function createChildAnimalCategories()
    {
        $data = [
            ['ngựa', 'bò', 'trâu', 'lợn', 'dê', 'cừu', 'thỏ'],
            ['gà', 'vịt', 'ngan', 'ngỗng', 'chim cút', 'đà điểu'],
            ['ong', 'tằm'],
        ];

        foreach ($data as $key => $subData) {
            foreach ($subData as $subKey => $subValue) {
                Category::create([
                    'name' => $subValue,
                    'type' => CategoryConstant::TYPE_ANIMAL,
                    'parent_id' => $this->animalCategoryIds[$key],
                ]);
            }
        }
    }
}
