<?php

namespace App\Http\Controllers\Api;

use App\Actions\CategoryActionInteface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CategoryController extends Controller
{
    /**
     * @var CategoryActionInteface
     */
    private $categoryAction;

    public function __construct(CategoryActionInteface $categoryAction)
    {
        $this->categoryAction = $categoryAction;
    }

    /**
     * Liệt kê danh mục
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        try {
            $categories = $this->categoryAction->index($request->all());

            return response()->json([
                'data' => CategoryResource::collection($categories),
                'success' => true,
            ]);
        } catch (Throwable $th) {
            Log::error(get_class($this) . '|index|' . $th->getMessage());

            return response()->json([
                'success' => false,
                'error' => __('errors.system'),
            ]);
        }
    }
}
