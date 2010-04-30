<?php
set_time_limit(60*60*0.5); // media hora de ejecucion limite

class FondoTemporalesController extends AppController {

	var $name = 'FondoTemporales';
	var $helpers = array('Html', 'Form', 'Paginator');
        var $instits=NULL;
        var $tipoInstits=NULL;
        var $localidades=NULL;
        var $lineasDeAccion=NULL;

        function beforeFilter() {
            parent::beforeFilter();
            
            $this->Instits = ClassRegistry::init("Instit");
            $this->Instits->recursive = 1;
            $this->instits = $this->Instits->find("all", array(
                        'limit'=>'50', // SACAR!
                        'fields'=> array('cue','nombre','nroinstit')));

            //$this->tipoInstits = $this->Instits->Tipoinstit->find("all", array(
            //            'limit'=>'5')); // SACAR!
        }

	function index() {
		$this->FondoTemporal->recursive = 0;
                $this->paginate = array('conditions'=>array('tipo'=>array('i','j')));
                $this->set('fondos', $this->paginate());
	}

        function checked_instits() {
                $checkedTotals = null;
                $checkedInstit = null;
                
		$this->FondoTemporal->recursive = 0;

                if (@is_numeric($this->passedArgs['checkedInstit'])) {
                    $checkedInstit = $this->passedArgs['checkedInstit'];
                    $checkedTotals = null;
                }
                elseif(@is_numeric($this->passedArgs['checkedTotals'])){
                    $checkedTotals = $this->passedArgs['checkedTotals'];
                    $checkedInstit = null;
                }
                
                if(!empty($checkedInstit)){
                    $this->paginate = array('conditions'=>array('tipo'=>'i', 'cue_checked'=>$checkedInstit));
                }
                else{
                    $this->paginate = array('conditions'=>array('tipo'=>'i', 'totales_checked'=>$checkedTotals));
                }

                $this->set('fondos', $this->paginate());
                $this->set('checkedInstit', $checkedInstit);
                $this->set('checkedTotals', $checkedTotals);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FondoTemporal.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('fondo', $this->FondoTemporal->read(null, $id));
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FondoTemporal', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FondoTemporal->save($this->data)) {
				$this->Session->setFlash(__('The FondoTemporal has been saved', true));
				$this->redirect(array('action'=>'checked_instits'));
			} else {
				$this->Session->setFlash(__('The FondoTemporal could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FondoTemporal->read(null, $id);
		}

                $difference = $this->data['FondoTemporal']['f01'] +
                             $this->data['FondoTemporal']['f02a'] +
                             $this->data['FondoTemporal']['f02b'] +
                             $this->data['FondoTemporal']['f02c'] +
                             $this->data['FondoTemporal']['f03a'] +
                             $this->data['FondoTemporal']['f03b'] +
                             $this->data['FondoTemporal']['f04'] +
                             $this->data['FondoTemporal']['f05'] +
                             $this->data['FondoTemporal']['f06a'] +
                             $this->data['FondoTemporal']['f06b'] +
                             $this->data['FondoTemporal']['f06c'] +
                             $this->data['FondoTemporal']['f07a'] +
                             $this->data['FondoTemporal']['f07b'] +
                             $this->data['FondoTemporal']['f07c'] +
                             $this->data['FondoTemporal']['f08'] +
                             $this->data['FondoTemporal']['f09'] +
                             $this->data['FondoTemporal']['f10'] +
                             $this->data['FondoTemporal']['f10'] +
                             $this->data['FondoTemporal']['equipinf'] +
                             $this->data['FondoTemporal']['refaccion'] -
                             $this->data['FondoTemporal']['total'];

		$instits = $this->FondoTemporal->Instit->find('list');
		$jurisdicciones = $this->FondoTemporal->Jurisdiccion->find('list');
		//$lineasDeAcciones = $this->FondoTemporal->LineasDeAccion->find('list');
		$this->set('difference', $difference);
                $this->set(compact('instits','jurisdicciones'));//,'lineasDeAcciones'));
	}

        function uncheckInstit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FondoTemporal', true));
                }
                else {
                    $this->data = $this->FondoTemporal->read(null, $id);
                    if (!empty($this->data)) {
                        $this->data['FondoTemporal']['cue_checked'] = 0;
                        if ($this->FondoTemporal->save($this->data)) {
                        } else {
                                $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                        }
                    }
                }

                $this->redirect(array('action'=>'checked_instits'));
	}

        function checkInstit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FondoTemporal', true));
                }
                else {
                    $this->data = $this->FondoTemporal->read(null, $id);
                    if (!empty($this->data)) {
                        $this->data['FondoTemporal']['cue_checked'] = 1;
                        if ($this->FondoTemporal->save($this->data)) {
                        } else {
                                $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                        }
                    }
                }

                $this->redirect(array('action'=>'checked_instits', 'checked'=>'2'));
	}

        function uncheckTotals($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FondoTemporal', true));
                }
                else {
                    $this->data = $this->FondoTemporal->read(null, $id);
                    if (!empty($this->data)) {
                        $this->data['FondoTemporal']['totales_checked'] = 0;
                        if ($this->FondoTemporal->save($this->data)) {
                        } else {
                                $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                        }
                    }
                }

                $this->redirect(array('action'=>'checked_instits'));
	}

        function checkTotals($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FondoTemporal', true));
                }
                else {
                    $this->data = $this->FondoTemporal->read(null, $id);
                    if (!empty($this->data)) {
                        $this->data['FondoTemporal']['totales_checked'] = 1;
                        if ($this->FondoTemporal->save($this->data)) {
                        } else {
                                $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                        }
                    }
                }

                $this->redirect(array('action'=>'checked_instits', 'checked'=>'2'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FondoTemporal', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FondoTemporal->del($id)) {
			$this->Session->setFlash(__('FondoTemporal deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


        function validar_instits() {
            $this->FondoTemporal->recursive = 0;
            $fondos = $this->FondoTemporal->find("all",
                            array('conditions'=> array('tipo'=>'i', 'cue_checked'=>0),
                                'limit'=>'50'));

            $this->Instits = ClassRegistry::init("Instit");
            $this->Instits->recursive = 0;
            $this->Instits->Tipoinstit->recursive = 0;
            $this->Instits->Departamento->recursive = 0;

            $jurisdiccion_id = '';

            // auditoria
            $fondos_totales = $cue_y_tipo_y_nro = $cue_y_no_tipo_y_nro = $no_cue_y_checked =
            $no_cue_y_no_checked = 0;

            if ($fondos_totales=count($fondos))
            {
                foreach ($fondos as $fondo)
                {
                    $cue_checked = $en_duda = false;

                    // 1. Acota proceso a Jurisdiccion con jurisdiccion_id
                    if ($jurisdiccion_id != $fondo['FondoTemporal']['jurisdiccion_id'])
                    {
                        // si cambia la jurisdiccion re-setea la coleccion de instits con
                        // la que va a trabajar
                        $jurisdiccion_id = $fondo['FondoTemporal']['jurisdiccion_id'];

                        // acota a instits de esta jurisdiccion
                        $this->instits = $this->Instits->find("all", array(
                        'limit'=>'500', // SACAR!
                        'conditions'=> array('Instit.jurisdiccion_id' => $jurisdiccion_id),
                        'fields'=> array('cue','nombre','nroinstit'),
                        'contain'=>array('Localidad(name)','Tipoinstit(name)'=>array('Jurisdiccion(name)'))));

                        // acota tipoInstits a esta jurisdiccion
                        /*$this->tipoInstits = $this->Instits->Tipoinstit->find("all", array(
                                'conditions'=> array('jurisdiccion_id' => $jurisdiccion_id)));
                   */
                        // trae todos los tipoInstits de esta jurisdiccion ordenados por cantidad de
                        $this->tipoInstits = $this->Instits->Tipoinstit->find("all", array(
                                'conditions'=> array('jurisdiccion_id' => $jurisdiccion_id),
                                'order'=> array('LENGTH(Tipoinstit.name)'=>'desc')
                            ));
                        //$localidades = $this->Instits->Departamento->Localidad->con_depto_y_jurisdiccion('all',$jurisdiccion_id);
                    }

                    // 2. Compara CUEs
                    if (strlen($fondo['FondoTemporal']['cuecompleto']))
                    {
                        // valida por nro de CUE
                        $instit = $this->Instits->find("all",array(
                            'conditions'=> array('"cue"*100+"anexo"'=>$fondo['FondoTemporal']['cuecompleto'],
                                                'Instit.jurisdiccion_id' => $jurisdiccion_id),
                            'fields'=> array('id','cue','nombre','nroinstit','tipoinstit_id'),
                            'contain'=>array('Localidad(name)','Tipoinstit(name)'=>array('Jurisdiccion(name)')
                            )));
                       
                        if (count($instit) == 1)
                        {
                            // el CUE fue encontrado
                            pr($instit);

                            $text = $fondo['FondoTemporal']['instit'];

                            $string_procesado = $this->optimizar_cadena($text);
                            $array_words = explode(" ", $string_procesado);
                       pr($string_procesado);
                            // chequea el numero y tipo de instit
                            if ($this->compara_numeroInstit($array_words, $instit['0']['Instit']['nroinstit']) &&
                                $this->compara_tipoInstit($string_procesado, $this->tipoInstits))
                            {
                                $cue_checked = true;
                                echo "CUE coincide, TIPO y NRO coinciden!";
                                $cue_y_tipo_y_nro++;

                                // edita cue_checked en 1 y asigna instit_id
                                $this->data = $this->FondoTemporal->read(null, $fondo['FondoTemporal']['id']);
                                if (!empty($this->data)) {
                                    $this->data['FondoTemporal']['cue_checked'] = 1;
                                    $this->data['FondoTemporal']['instit_id'] = $instit['0']['Instit']['id'];
                                    if ($this->FondoTemporal->save($this->data)) {
                                    } else {
                                            $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                                    }
                                }
                            }
                            else {
                                $cue_y_no_tipo_y_nro++;
                                $en_duda = true;
                                echo "CUE coincide, TIPO y NRO no coinciden!";

                                 // edita cue_checked en 2 (duda)
                                $this->data = $this->FondoTemporal->read(null, $fondo['FondoTemporal']['id']);
                                if (!empty($this->data)) {
                                    $this->data['FondoTemporal']['cue_checked'] = 2;
                                    $this->data['FondoTemporal']['instit_id'] = $instit['0']['Instit']['id'];
                                    if ($this->FondoTemporal->save($this->data)) {
                                    } else {
                                            $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                                    }
                                }
                            }
                        }
                    }

                    if (!$cue_checked)
                    {
                        echo "CUE NO coincide!";
                        // 3. Compara nro de instit
                        if (strlen($fondo['FondoTemporal']['instit']))
                        {
                            // compara nombres
                            $text = $fondo['FondoTemporal']['instit'];

                            $string_procesado = $this->optimizar_cadena($text);
                            $string_procesado = $this->str_sin_tipoInstit($string_procesado, $this->tipoInstits);
                            $array_words = explode(" ", $string_procesado);

                            if (count($this->instits)) {
                                foreach ($this->instits as $instit)
                                {
                                    $string_procesado_aux = $this->optimizar_cadena($instit['Instit']['nombre_completo']);
                                    $string_procesado_aux = $this->str_sin_tipoInstit($string_procesado_aux, $this->tipoInstits);

                                    $array_words_aux = explode(" ", $string_procesado_aux);

                                    $matchea_nombre = false;

                                    // chequea el numero de instit
                                    if ($this->compara_numeroInstit($array_words, $instit['Instit']['nroinstit'])) 
                                    {
                                        if ($string_procesado == $string_procesado_aux || 
                                            $this->compara_institNombres($array_words, $array_words_aux)) {
                                            // tienen el mismo nombre
                                            $matchea_nombre = true;
                                            echo "NOMBRES Y NUMERO COINCIDEN!!!";
                                            $no_cue_y_checked++;

                                            // edita cue_checked en 1 y asigna instit_id
                                            $this->data = $this->FondoTemporal->read(null, $fondo['FondoTemporal']['id']);
                                            if (!empty($this->data)) {
                                                $this->data['FondoTemporal']['cue_checked'] = 1;
                                                $this->data['FondoTemporal']['instit_id'] = $instit['Instit']['id'];
                                                if ($this->FondoTemporal->save($this->data)) {
                                                } else {
                                                        $this->Session->setFlash(__('El FondoTemporal id '.$fondo['FondoTemporal']['id'].' no pudo ser actualizado.', true));
                                                }
                                            }
                                        }
                                        else {
                                            $no_cue_y_no_checked++;
                                        }
                                    }
                                    else {
                                        $no_cue_y_no_checked++;
                                    }

                                    // si el name de la tabla Tipoinstit contiene parte del nombre
                                    if ($this->compara_tipoInstit($string_procesado, $this->tipoInstits)) {

                                    }

                                    // chequea diferencia de palabras
                                }
                            }
                        }
                    }
                }
            }

            echo "CUE y Tipo y Nro: ".$cue_y_tipo_y_nro."<br>CUE y NO Tipo y Nro: ".$cue_y_no_tipo_y_nro;
            echo "<br>NO CUE y Checked: ".$no_cue_y_checked."<br>NO CUE y NO Checked: ".$no_cue_y_no_checked;
	}

        function getCueCompleto($cueincompleto, $anexo=0) {
            return $cueincompleto*100 + $anexo;
        }

        /**
	 *
	 * compara dos nombres de instit sin tipo ni numero
	 *
	 * @param $array_words_temp
         * @param $array_words
	 */
        function compara_InstitNombres($array_words_temp, $array_words)
        {
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

            if ($peso > 1) {
                pr($array_words_temp);
                pr($array_words);

                echo "limit: ".$limit."   -   peso: ".$peso;
            }

            // compara limit con el peso encontrado
            if ($peso > 0 && $limit/$peso > $limit/2) {
                return true;
                echo "TRUE! limit: ".$limit."   -   peso: ".$peso;
            }
            
            return false;
        }

        function length_cmp( $a, $b ) {
            return strlen($b)-strlen($a);
        }


        /**
	 *
	 * compara el nro de instit que viene en el array de words con el enviado
         * por parametro
	 *
	 * @param $words
         * @param $nroinstit
	 */
        function compara_numeroInstit($words, $nroinstit) {
            $numero = '';

            foreach ($words as $value1) {
                // busca por n�
                $pos = strpos($value1,'n�');
                if ($pos !== false) {
                    $numero = str_replace('n�','',$value1);
                }
                else
                {
                    // busca por A- (privados)
                    $pos = strpos($value1,'a-');
                    if ($pos !== false) {
                        $numero = $value1;
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
                       'e alternancia',
                       'et agro ',
                       'etagro ',
                       'etagro',
                       'eagro ',
                       'et ',
                       'inspt',
                       'centro ',
                       'cent',
                       'cfp',
                       'centro fp',
                       'cea',
                       'eea',
                       'cfr',
                       'eee',
                       'efa',
                       'cept',
                       'cpet',
                       'ies',
                       'iea',
                       'eem',
                       'isfdyt',
                       'mm',
                       'monotec ',
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
            
            $b = array("ESCUELA DE EDUCACI�N T�CNICA (E.E.T.)",
                       "ESCUELA DE ALTERNANCIA",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA T�CNICA AGROPECUARIA ",
                       "ESCUELA AGROT�CNICA ",
                       "ESCUELA DE EDUCACI�N T�CNICA (E.E.T.) ",
                       "INSTITUTO NACIONAL SUPERIOR DEL PROFESORADO T�CNICO (I.N.S.P.T.)",
                       "centro ",
                       "CENTRO EDUCATIVO DE NIVEL TERCIARIO (C.E.N.T.)",
                       "CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)",
                       "CENTRO DE FORMACI�N PROFESIONAL (C.F.P.)",
                       "CENTRO DE EDUCACI�N AGR�COLA (C.E.A.)",
                       "ESCUELA DE EDUCACI�N AGRARIA (E.E.A.)",
                       "CENTRO DE FORMACI�N RURAL (C.F.R.)",
                       "ESCUELA DE EDUCACI�N ESPECIAL (E.E.E.)",
                       "ESCUELA DE LA FAMILIA AGRIC�LA (E.F.A.)",
                       "CENTRO EDUCATIVO PARA LA PRODUCCI�N TOTAL (C.E.P.T.)",
                       "COLEGIO PROVINCIAL DE EDUCACI�N TECNOL�GICA (C.P.E.T.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR (I.E.S.)",
                       "INSTITUTO DE ENSE�ANZA AGROPECUARIA (I.E.A.)",
                       "ESCUELA DE EDUCACI�N MEDIA (E.E.M.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DE FORMACI�N DOCENTE Y T�CNICA (I.S.F.D.yT.)",
                       "MISI�N MONOT�CNICA (M.M.)",
                       "MISI�N MONOT�CNICA (M.M.) ",
                       "ESCUELA NACIONAL DE EDUCACI�N T�CNICA (E.N.E.T.)",
                       "INSTITUTO DE EDUCACI�N SUPERIOR DEL PROFESORADO (I.S.P.)",
                       "CENTRO DE DESARROLLO REGIONAL (CE.DE.R.)",
                       "INSTITUTO PROVINCIAL DE EDUCACI�N MEDIA (I.P.E.M.)",
                       "CENTRO EDUCATIVO DE NIVEL SECUNDARIO (C.E.N.S.)",
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
                       'centro fp',
                       'cea',
                       'eea',
                       'cfr',
                       'eee',
                       'efa',
                       'cept',
                       'cpet',
                       'ies',
                       'iea',
                       'eem',
                       'isfdyt',
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


        /**
	 *
	 * optimiza nombre de instits para una futura comparacion
	 *
	 * @param $text
	 */
	function optimizar_cadena($text){
		
                // elimina acentos y especiales
                $a = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
                $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
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

                $palabras_reservadas = array(
                       /* "colegio",
                        "escuela",
                        "esc ",
                        "instituto",
                        "et",
                        "e ",
                        "eet",*/
                        "- ",
                        " - ",
                        "."
                );

                // elimina palabras reservadas
                $text = str_replace($palabras_reservadas, '', $text);

                // junta los n�
                $text = str_replace("n� ","n�",$text);
                // algunos casos tienen N'
                $text = str_replace("n' ","n�",$text);
                
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

        function validar_totales() {
            $totalSmallDiference = 10;
            $totalBigDiference = 100;
            $total = 0;

            $this->FondoTemporal->recursive = 0;

            /*VALIDACION HORIZONTAL*/
            $fondos = $this->FondoTemporal->find("all",
                            array('conditions'=> array('tipo'=>'i', 'totales_checked'=>0)));
            
            foreach ($fondos as &$fondo){
                    $totales_checked = false;

                    $total = abs($fondo['FondoTemporal']['f01'] +
                             $fondo['FondoTemporal']['f02a'] +
                             $fondo['FondoTemporal']['f02b'] +
                             $fondo['FondoTemporal']['f02c'] +
                             $fondo['FondoTemporal']['f03a'] +
                             $fondo['FondoTemporal']['f03b'] +
                             $fondo['FondoTemporal']['f04'] +
                             $fondo['FondoTemporal']['f05'] +
                             $fondo['FondoTemporal']['f06a'] +
                             $fondo['FondoTemporal']['f06b'] +
                             $fondo['FondoTemporal']['f06c'] +
                             $fondo['FondoTemporal']['f07a'] +
                             $fondo['FondoTemporal']['f07b'] +
                             $fondo['FondoTemporal']['f07c'] +
                             $fondo['FondoTemporal']['f08'] +
                             $fondo['FondoTemporal']['f09'] +
                             $fondo['FondoTemporal']['f10'] -
                             $fondo['FondoTemporal']['total']);

                    /*Total Chequeado*/
                    if($total == 0){
                        $fondo['FondoTemporal']['totales_checked'] = 1;
                    }/*Total con diferencia peque�a ---> Ajuste*/
                    elseif($total < $totalSmallDiference){
                        $fondo['FondoTemporal']['totales_checked'] = 2;
                    }/*Total con diferencia grande ---> Ajuste*/
                    elseif($total < $totalBigDiference){
                        $fondo['FondoTemporal']['totales_checked'] = 3;
                    }/*Total con diferencia abismal --> Posible error en carga*/
                    else{
                        $fondo['FondoTemporal']['totales_checked'] = 0;
                    }
            }
            
            $this->FondoTemporal->saveAll($fondos);

            $this->redirect(array('action'=>'checked_instits'));
        }
}
?>