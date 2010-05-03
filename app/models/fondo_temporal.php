<?php
class FondoTemporal extends AppModel {

	var $name = 'FondoTemporal';
        var $useTable = 'z_fondo_work';
        
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Instit' => array('className' => 'Instit',
								'foreignKey' => 'instit_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Jurisdiccion' => array('className' => 'Jurisdiccion',
								'foreignKey' => 'jurisdiccion_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
        


        function getCueCompleto($cueincompleto, $anexo=0) {
            return $cueincompleto*100 + $anexo;
        }

        function getInstitByCueIncompleto($instits, $cue_incompleto) {
            foreach ($instits as $instit) {
                if ($instit['Instit']['cue']*100+$instit['Instit']['anexo'] == $cue_incompleto)
                {
                    return $instit;
                }
            }
        }

        function asignarInstitYEstadoATemp($instit_id, $estado, $temp_id) {
            /*$this->data = $this->read(null, $temp_id);
            if (!empty($this->data)) {
                $this->data['FondoTemporal']['cue_checked'] = $estado;
                $this->data['FondoTemporal']['instit_id'] = $instit_id;
                if ($this->save($this->data)) {
                } else {
                        $this->Session->setFlash(__('El FondoTemporal id '.$temp_id.' no pudo ser actualizado.', true));
                }
            }
            */
            // evita un select gigante en cada update
            $this->query("UPDATE z_fondo_work SET cue_checked=".$estado.", instit_id=".$instit_id." WHERE id=".$temp_id.";");
        }



        /**
	 *
	 * compara dos nombres de instit sin tipo ni numero
	 *
	 * @param $text_temp
         * @param $text
	 */
        function compara_InstitNombres($text_temp, $text, $tipoInstits=NULL)
        {
            $text_temp = $this->str_sin_tipoInstit($this->optimizar_cadena($text_temp), $tipoInstits);
            $text = $this->str_sin_tipoInstit($this->optimizar_cadena($text), $tipoInstits);

            if ($text_temp == $text)
                return true;

            $array_words = explode(" ", $text);
            $array_words_temp = explode(" ", $text_temp);
            $text = $this->str_sin_tipoInstit($this->optimizar_cadena($text), $tipoInstits);
            $array_words = explode(" ", $text);
            //$array_words_temp = $text_temp;
            // ordena un vector por length de palabras desc
            //usort($array_words_temp, array("FondoTemporalesController", "length_cmp"));

            // quitar N� , comparar cada posicion con todas las de array_words
            $palabras_totales = count($array_words_temp);
            $peso = 0;
            for ($i=0; $i < count($array_words_temp); $i++) {
                // que no sea n�
                /*$pos_temp = strpos($array_words_temp[$i],'n�');
                if ($pos_temp === false) {*/
                    foreach ($array_words as $array_word) {
                        if ($array_words_temp[$i] == $array_words) {
                            $peso++;
                        }
                        elseif (strlen($array_word) >= 4 && strlen($array_words_temp[$i]) >= 4) {
                            if (levenshtein($array_words_temp[$i], $array_word) <= 1) {
                                $peso++;
                            }
                        }
                    }
               /* }
                else {
                    $palabras_totales--;
                }*/
            }

            if (count($array_words) > count($array_words_temp)) {
                $limit = count($array_words);
            } else {
                $limit = count($array_words_temp);
            }

            // compara limit con el peso encontrado
            if ($peso > 0 && $peso > $limit/2) {
                pr($array_words_temp);
                pr($array_words);

                echo "TRUE! limit: ".$limit."   -   peso: ".$peso;
                return true;
            }

            return false;
        }

        function length_cmp( $a, $b ) {
            return strlen($b)-strlen($a);
        }

         /**
	 *
	 * optimiza nombre de instits para una futura comparacion
	 *
	 * @param $text
	 */
	function optimizar_cadena($text) {

                // elimina acentos y especiales
                $a = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');
                $b = array('a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
                $text = str_replace($a, $b, $text);

                $text = strtolower($text);

                // algunos casos tienen = en lugar de -
                $text = str_replace("=","-",$text);

                // mas especiales
                $a = array('agro.', 'e. ', 'et'," -", '- ', '. ', '�');
                $b = array('agro ', 'e ', 'et ', ' ', ' ', ' ', '�');
                $text = str_replace($a, $b, $text);

                // elimina espacios en blanco en exceso (maximo deja uno)
                $text = preg_replace('/\s\s+/', ' ', $text);

                $palabras_reservadas = array("- ", " - ", ".");

                // elimina palabras reservadas
                $text = str_replace($palabras_reservadas, '', $text);

                // junta los n�
                $text = str_replace("n� ","n�",$text);
                // algunos casos tienen N'
                $text = str_replace("n' ","n�",$text);
                // algunos casos tienen N|
                $text = str_replace("n| ","n�",$text);

                // separa "n�" si esta pegado al nombre
                $pos = $pos_fin = '';
                $pos = strpos($text,'�');
                if ($pos !== false)
                {
                    $fin = false;
                    for ($i=($pos+1); $i<strlen($text) && !$fin; $i++)
                    {
                        if (!is_numeric($text[$i])) {
                            $fin = true;
                            $pos_fin = $i;
                        }
                    }

                    if ($pos_fin > $pos) {
                        // pone espacio luego del numero
                        $text = substr($text, 0, $pos_fin)."".substr($text, $pos_fin);
                    }
                }


		return trim($text);
	}



        /**
	 *
	 * compara el nro de instit inmerso en el nombre con el enviado
         * por parametro
	 *
	 * @param $text
         * @param $nroinstit
	 */
        function compara_numeroInstit($text, $nroinstit) {
            $numero = '';
            $text = $this->optimizar_cadena($text);
            $words = explode(" ", $text);
            //$words = $text;
            foreach ($words as $value1) {
                // busca por n�
                $pos = strpos($value1,'n�');
                if ($pos !== false) {
                    $numero = str_replace('n�','',$value1);
                    break;
                }
                else
                {
                    // busca por A- (privados)
                    $pos = strpos($value1,'a-');
                    if ($pos !== false) {
                        $numero = $value1;
                        break;
                    }
                }

                // busca por D.E.
                /*$pos = strpos($value1,'de');
                if ($pos !== false) {
                    $numero = str_replace('n�','',$value1);
                }*/
            }

            if (!strlen($numero)) {
                // no tiene ningun numero en su nombre
                return true;
            }

            if (is_numeric($numero)) {
                return ((int)$numero == (int)strtolower($nroinstit));
            }
            else {
                return (strtolower($numero) == strtolower($nroinstit));
            }
        }

        /**
	 *
	 * compara el tipo de instit inmerso en el nombre con los tipos existentes
	 *
	 * @param $instit
         * @param $tiposInstit
	 */
        function compara_tipoInstit($instit, $tiposInstit)
        {
            $instit = $this->optimizar_cadena($instit);
            $instit = $this->completa_tipoInstit_abreviados($instit);

            foreach ($tiposInstit as $tipoInstit) {
                $pos = strpos(strtoupper($instit), strtoupper($tipoInstit['Tipoinstit']['name']));

                if ($pos !== false)
                {
                    // contiene el TIPO
                    return true;
                }
            }

            return false;

        }


        /**
	 *
	 * completa cadena en caso de tener abreviaturas
	 *
	 * @param $instit
	 */
        function completa_tipoInstit_abreviados($instit) {
            $instit = str_replace('.','',strtolower($instit));

            $a = array('eet',
                       'escuela de educacion tecnica',
                       'e alternancia',
                       'et agro ',
                       'etagro ',
                       'etagro',
                       'eagro ',
                       'et ',
                       'inspt',
                       'centro ',
                       'cent ',
                       'cfl',
                       'cfp',
                       'centro fp',
                       'centro de formacion profesional',
                       'centro de formacion laboral',
                       'cea',
                       'centro de educacion agricola',
                       'eea',
                       'cfr',
                       'eee',
                       'efa',
                       'efp',
                       'cept',
                       'centro educativo para la produccion total',
                       'centro educativo para la produccion',
                       'cpet',
                       'ies',
                       'iea',
                       'eem',
                       'isfdyt',
                       'isfd y t',
                       'mm',
                       'mision monotecnica',
                       'monotec ',
                       'enet',
                       'isp',
                       'ceder',
                       'ipem',
                       'cens',
                       'copyco',
                       'centro de orientacion profesional y capacitacion obrera',
                       'uep',
                       'iset',
                       'eeat',
                       'cecla',
                       'epet',
                       'epnm',
                       'etp',
                       'itec',
                       'cct',
                       'cemoe',
                       'epea',
                       'cepaho',
                       'ufidet',
                       'eetpi',
                       'eetpa',
                       'ispi'
                );

            $b = array("ESCUELA DE EDUCACI�N T�CNICA (E.E.T.)",
                       "ESCUELA DE EDUCACI�N T�CNICA (E.E.T.)",
                       "ESCUELA DE ALTERNANCIA",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA AGROT�CNICA ",
                       "ESCUELA DE EDUCACI�N T�CNICA (E.E.T.) ",
                       "INSTITUTO NACIONAL SUPERIOR DEL PROFESORADO T�CNICO (I.N.S.P.T.)",
                       "centro ",
                       "CENTRO EDUCATIVO DE NIVEL TERCIARIO (C.E.N.T.) ",
                       "CENTRO DE FORMACI�N LABORAL",
                       "CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)",
                       "CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)",
                       "CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)",
                       "CENTRO DE FORMACI�N LABORAL",
                       "CENTRO DE EDUCACI�N AGR�COLA (C.E.A.)",
                       "CENTRO DE EDUCACI�N AGR�COLA (C.E.A.)",
                       "ESCUELA DE EDUCACI�N AGRARIA (E.E.A.)",
                       "CENTRO DE FORMACI�N RURAL (C.F.R.)",
                       "ESCUELA DE EDUCACI�N ESPECIAL (E.E.E.)",
                       "ESCUELA DE LA FAMILIA AGRIC�LA (E.F.A.)",
                       "ESCUELA DE FORMACI�N PROFESIONAL",
                       "CENTRO EDUCATIVO PARA LA PRODUCCI�N TOTAL (C.E.P.T.)",
                       "CENTRO EDUCATIVO PARA LA PRODUCCI�N TOTAL (C.E.P.T.)",
                       "CENTRO EDUCATIVO PARA LA PRODUCCI�N TOTAL (C.E.P.T.)",
                       "COLEGIO PROVINCIAL DE EDUCACI�N TECNOL�GICA (C.P.E.T.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR (I.E.S.)",
                       "INSTITUTO DE ENSE�ANZA AGROPECUARIA (I.E.A.)",
                       "ESCUELA DE EDUCACI�N MEDIA (E.E.M.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DE FORMACI�N DOCENTE Y T�CNICA (I.S.F.D.yT.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DE FORMACI�N DOCENTE Y T�CNICA (I.S.F.D.yT.)",
                       "MISI�N MONOT�CNICA (M.M.)",
                       "MISI�N MONOT�CNICA (M.M.)",
                       "MISI�N MONOT�CNICA (M.M.) ",
                       "ESCUELA NACIONAL DE EDUCACI�N T�CNICA (E.N.E.T.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DEL PROFESORADO (I.S.P.)",
                       "CENTRO DE DESARROLLO REGIONAL (CE.DE.R.)",
                       "INSTITUTO PROVINCIAL DE EDUCACI�N MEDIA (I.P.E.M.)",
                       "CENTRO EDUCATIVO DE NIVEL SECUNDARIO (C.E.N.S.)",
                       "CENTRO DE ORIENTACI�N PROFESIONAL Y CAPACITACI�N OBRERA (C.O.P.Y.C.O.)",
                       "CENTRO DE ORIENTACI�N PROFESIONAL Y CAPACITACI�N OBRERA (C.O.P.Y.C.O.)",
                       "UNIDAD EDUCATIVA PRIVADA (U.E.P.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DE EDUCACI�N T�CNICA (I.S.E.T.)",
                       "ESCUELA DE EDUCACI�N AGROT�CNICA (E.E.A.T.)",
                       "CENTRO DE CAPACITACI�N LABORAL (CE.C.LA.)",
                       "ESCUELA PROVINCIAL DE EDUCACI�N T�CNICA (E.P.E.T.)",
                       "ESCUELA PROVINCIAL DE NIVEL MEDIO (E.P.N.M.)",
                       "ESCUELA T�CNICA PROVINCIAL (E.T.P.)",
                       "INSTITUTO TECNOL�GICO (I.TEC.)",
                       "CENTRO DE CAPACITACI�N PARA EL TRABAJO (C.C.T.)",
                       "CENTRO DE MANO DE OBRA ESPECIALIZADA (CE.M.O.E.)",
                       "ESCUELA PROVINCIAL DE EDUCACI�N AGROPECUARIA (E.P.E.A.)",
                       "CENTRO EDUCATIVO PARA EL HOGAR (CE.PA.HO.)",
                       "UNIDAD DE FORMACI�N, INVESTIGACI�N Y DESARROLLO TECNOL�GICO (U.F.I.D.E.T.)",
                       "ESCUELA DE ENSE�ANZA T�CNICA PARTICULAR INCORPORADA (E.E.T.P.I.)",
                       "ESCUELA DE EDUCACI�N T�CNICA PARTICULAR AUTORIZADA (E.E.T.P.A.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR PARTICULAR INCORPORADA (I.S.P.I.)"
                );

            return trim(strtolower(str_replace($a, $b, $instit)));
        }

        /**
	 *
	 * elimina el tipoInstit de la cadena dada
	 *
	 * @param $instit
         * @param $tiposInstit
	 */
        function str_sin_tipoInstit($instit, $tiposInstit)
        {
            //$instit = $this->optimizar_cadena($instit);

            foreach ($tiposInstit as $tipoInstit) {
                $b[] = $this->optimizar_cadena($tipoInstit['Tipoinstit']['name']);
            }

            $instit = strtolower(str_replace($b, '', $instit));

            $instit = str_replace('.','',strtolower($instit));

            $a = array('eet',
                       'escuela de educacion tecnica',
                       'e alternancia',
                       'et agro ',
                       'etagro ',
                       'etagro',
                       'eagro ',
                       'et ',
                       'inspt',
                       'cent ',
                       'cfp',
                       'cfl',
                       'centro fp',
                       'cea',
                       'eea',
                       'cfr',
                       'eee',
                       'efa',
                       'efp',
                       'cept',
                       'cpet',
                       'ies',
                       'iea',
                       'eem',
                       'isfdyt',
                       'isfd y t',
                       'mm',
                       'enet',
                       'isp',
                       'ceder',
                       'ipem',
                       'cens',
                       'copyco',
                       'uep',
                       'iset',
                       'eeat',
                       'cecla',
                       'epet',
                       'epnm',
                       'etp',
                       'itec',
                       'cct',
                       'cemoe',
                       'epea',
                       'cepaho',
                       'ufidet',
                       'eetpi',
                       'eetpa',
                       'ispi'
                );

            $instit = str_replace($a, '', $instit);
            $instit = str_replace('()', '', $instit);

            // elimina espacios en blanco en exceso (maximo deja uno)
            $instit = preg_replace('/\s\s+/', ' ', $instit);

            return trim(strtolower($instit));
        }

}
?>