<?php
class REST{
    public static function sevicioAPOD($fecha) {
        return json_decode(file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$fecha"), true);        
    }
    
}
