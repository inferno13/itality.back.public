<?php

namespace App\Http\Controllers\BaseLoop;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseLoop\UpdateRequest;
use App\Models\BaseLoop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $base_loop = BaseLoop::find($data['id']);
      if ($base_loop == null) {
          return response()->json(['message' => 'Петля не найдена.']);
      }

      if (isset($data['scheme']) && !is_file($data['scheme']) && !is_string($data['scheme'])) {
        return json_encode(['message' => 'В данное поле нужно загрузить файл или строчный тип данных.']);
      }

      if (isset($data['schemee']) && is_string($data['scheme'])) {
        if($base_loop['scheme'] != "")
        {
            Storage::disk('public')->delete($base_loop['scheme']);
        }
        $copy = 'base-loop/' . Str::random() . explode('/', $data['scheme'])[1];
        $file = 'public/'.$data['scheme'];
        $success = Storage::copy($file, 'public/'.$copy);
        if ($success) {
            $data['scheme'] = $copy;
        }
    }

    if ($data['scheme'] && is_file($data['scheme'])) {
        if($base_loop['scheme'] != "")
        {
            Storage::disk('public')->delete($base_loop['scheme']);
        }
        $data['scheme'] = Storage::disk('public')->put('base-loop', $data['scheme']);
    }

      $base_loop->update($data);

      return $base_loop;
  }
}
