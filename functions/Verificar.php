<?php

    class Verificar{

        public function Verificacao($usuario,$senha){
            if($usuario == ''){
                return -1;
            }
            elseif($senha == ''){
                return -2;
            }
        }

    }