<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImagesController extends Controller
{
    public function index($image)
    {
        // $image = "123145.png";
        // Определяем MIME-тип изображения (например, image/png, image/jpeg и т. д.)
        $mimeType = mime_content_type(storage_path('app/public/' . $image));
        // Возвращаем изображение как ответ с правильным MIME-типом
        return Response::make(file_get_contents(storage_path('app/public/' . $image)), 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $image . '"',
        ]);
    }
}
