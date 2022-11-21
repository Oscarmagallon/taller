<?php

    
        function enviarLog ($texto){
           
        $logFile = fopen("c:\\log.txt","a");
        fwrite($logFile, "\n".date("d/m/Y H:i:s")." ".$texto) or die("Error escribiendo en el archivo");
        fclose($logFile);
        return;
        }
