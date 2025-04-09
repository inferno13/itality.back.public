<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Rule;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function __invoke()
    {
        $dir = __DIR__;
        $dir = str_replace("Group", "", $dir);

        foreach (scandir($dir) as $folder) {

            if (!str_contains($folder, ".")) {

                foreach (scandir($dir . $folder) as $file) {

                    if ($file != '.' and $file != '..' and $file != 'RulesController.php') {

                        $controller = str_replace('.php', '', $file);

                        if(isset($rule['active']) && $rule['active'] == true)
                        {
                            $mas[$folder][$controller] = true;
                        }
                        else
                        {
                            $mas[$folder][$controller] = false;
                        }
                    }
                }
            }
        }

        return $mas;
    }

}
