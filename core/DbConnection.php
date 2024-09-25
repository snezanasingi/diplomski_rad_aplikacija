<?php

namespace app\core;

use mysqli;

class DbConnection
{
    public function con() : mysqli
    {
        $mysgl = new mysqli("localhost", "root", "","biljkedb") or die(mysqli_error($mysgl));
        return $mysgl;                                                              // vrati nasu celu konekciju sa bazom
    }
}