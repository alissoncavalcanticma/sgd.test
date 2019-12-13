<?php

class Checklist{
	private $pdo;
	private $id;
	private $turno;
	private $data;
	private $operador_fca;
	private $operador_sp;
	private $operador_tr;
	private $entrada_fca;
	private $saida_fca;
	private $entrada_sp;
	private $saida_sp;
	private $entrada_tr;
	private $saida_tr;
	private $racks_fca;
	private $racks_sp;
	private $racks_tr;
	private $org_fca;
	private $org_sp;
	private $org_tr;
	private $lumin_fca;
	private $lumin_sp;
	private $lumin_tr;
	private $infra_fca;
	private $infra_sp;
	private $infra_tr;
	private $acesso_fca;
	private $acesso_sp;
	private $acesso_tr;
	private $portacf_fca;
	private $portacf_sp;
	private $arc_fca;
	private $arc_sp;
	private $arc_tr;
	private $sist_extint_fca;
	private $sist_extint_sp;
	private $sist_extint_tr;
	private $ledsaude_fca;
	private $temp01_fca;
	private $humid01_fca;
	private $temp01_sp;
	private $humid01_sp;
	private $temp02_fca;
	private $humid02_fca;
	private $temp02_sp;
	private $humid02_sp;
	private $temp03_fca;
	private $humid03_fca;
	private $temp03_sp;
	private $humid03_sp;
	private $cap_ups_tr;
	private $lumin_sc_fca;
	private $portacf_sc_fca;
	private $acesso_sc_fca;
	private $geradores_fca;
	private $geradores_sp;
	private $org_ext_fca;
	private $org_ext_sp;
	private $org_ext_tr;
	private $zabbix;
	private $obs_fca;
	private $obs_sp;
	private $obs_tr;
	private $chk_carro;
	private $chk_sala;
	private $chk_not;
	private $chk_cel;
	private $chk_batcel;
    private $obs_npo;
    
    /** Inc DR **/

    private $operador_dr;
    private $entrada_dr;
    private $saida_dr;
    private $racks_dr;
    private $org_dr;
    private $lumin_dr;
    private $infra_dr;
    private $acesso_dr;
    private $portacf_dr;
    private $arc_dr;
    private $sist_extint_dr;
    private $ledsaude_dr;
    private $temp_dr;
    private $humid_dr;
    private $org_ext_dr;
    private $obs_dr;


	public function __construct($pdo){

		$this->pdo = $pdo;

	}
	
	public function getId(){
		return $this->id;
	}

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * @param mixed $turno
     *
     * @return self
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperadorFca()
    {
        return $this->operador_fca;
    }

    /**
     * @param mixed $operador_fca
     *
     * @return self
     */
    public function setOperadorFca($operador_fca)
    {
        $this->operador_fca = $operador_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperadorSp()
    {
        return $this->operador_sp;
    }

    /**
     * @param mixed $operador_sp
     *
     * @return self
     */
    public function setOperadorSp($operador_sp)
    {
        $this->operador_sp = $operador_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperadorTr()
    {
        return $this->operador_tr;
    }

    /**
     * @param mixed $operador_tr
     *
     * @return self
     */
    public function setOperadorTr($operador_tr)
    {
        $this->operador_tr = $operador_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntradaFca()
    {
        return $this->entrada_fca;
    }

    /**
     * @param mixed $entrada_fca
     *
     * @return self
     */
    public function setEntradaFca($entrada_fca)
    {
        $this->entrada_fca = $entrada_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaidaFca()
    {
        return $this->saida_fca;
    }

    /**
     * @param mixed $saida_fca
     *
     * @return self
     */
    public function setSaidaFca($saida_fca)
    {
        $this->saida_fca = $saida_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntradaSp()
    {
        return $this->entrada_sp;
    }

    /**
     * @param mixed $entrada_sp
     *
     * @return self
     */
    public function setEntradaSp($entrada_sp)
    {
        $this->entrada_sp = $entrada_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaidaSp()
    {
        return $this->saida_sp;
    }

    /**
     * @param mixed $saida_sp
     *
     * @return self
     */
    public function setSaidaSp($saida_sp)
    {
        $this->saida_sp = $saida_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntradaTr()
    {
        return $this->entrada_tr;
    }

    /**
     * @param mixed $entrada_tr
     *
     * @return self
     */
    public function setEntradaTr($entrada_tr)
    {
        $this->entrada_tr = $entrada_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaidaTr()
    {
        return $this->saida_tr;
    }

    /**
     * @param mixed $saida_tr
     *
     * @return self
     */
    public function setSaidaTr($saida_tr)
    {
        $this->saida_tr = $saida_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRacksFca()
    {
        return $this->racks_fca;
    }

    /**
     * @param mixed $racks_fca
     *
     * @return self
     */
    public function setRacksFca($racks_fca)
    {
        $this->racks_fca = $racks_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRacksSp()
    {
        return $this->racks_sp;
    }

    /**
     * @param mixed $racks_sp
     *
     * @return self
     */
    public function setRacksSp($racks_sp)
    {
        $this->racks_sp = $racks_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRacksTr()
    {
        return $this->racks_tr;
    }

    /**
     * @param mixed $racks_tr
     *
     * @return self
     */
    public function setRacksTr($racks_tr)
    {
        $this->racks_tr = $racks_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgFca()
    {
        return $this->org_fca;
    }

    /**
     * @param mixed $org_fca
     *
     * @return self
     */
    public function setOrgFca($org_fca)
    {
        $this->org_fca = $org_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgSp()
    {
        return $this->org_sp;
    }

    /**
     * @param mixed $org_sp
     *
     * @return self
     */
    public function setOrgSp($org_sp)
    {
        $this->org_sp = $org_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgTr()
    {
        return $this->org_tr;
    }

    /**
     * @param mixed $org_tr
     *
     * @return self
     */
    public function setOrgTr($org_tr)
    {
        $this->org_tr = $org_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuminFca()
    {
        return $this->lumin_fca;
    }

    /**
     * @param mixed $lumin_fca
     *
     * @return self
     */
    public function setLuminFca($lumin_fca)
    {
        $this->lumin_fca = $lumin_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuminSp()
    {
        return $this->lumin_sp;
    }

    /**
     * @param mixed $lumin_sp
     *
     * @return self
     */
    public function setLuminSp($lumin_sp)
    {
        $this->lumin_sp = $lumin_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuminTr()
    {
        return $this->lumin_tr;
    }

    /**
     * @param mixed $lumin_tr
     *
     * @return self
     */
    public function setLuminTr($lumin_tr)
    {
        $this->lumin_tr = $lumin_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfraFca()
    {
        return $this->infra_fca;
    }

    /**
     * @param mixed $infra_fca
     *
     * @return self
     */
    public function setInfraFca($infra_fca)
    {
        $this->infra_fca = $infra_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfraSp()
    {
        return $this->infra_sp;
    }

    /**
     * @param mixed $infra_sp
     *
     * @return self
     */
    public function setInfraSp($infra_sp)
    {
        $this->infra_sp = $infra_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfraTr()
    {
        return $this->infra_tr;
    }

    /**
     * @param mixed $infra_tr
     *
     * @return self
     */
    public function setInfraTr($infra_tr)
    {
        $this->infra_tr = $infra_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcessoFca()
    {
        return $this->acesso_fca;
    }

    /**
     * @param mixed $acesso_fca
     *
     * @return self
     */
    public function setAcessoFca($acesso_fca)
    {
        $this->acesso_fca = $acesso_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcessoSp()
    {
        return $this->acesso_sp;
    }

    /**
     * @param mixed $acesso_sp
     *
     * @return self
     */
    public function setAcessoSp($acesso_sp)
    {
        $this->acesso_sp = $acesso_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcessoTr()
    {
        return $this->acesso_tr;
    }

    /**
     * @param mixed $acesso_tr
     *
     * @return self
     */
    public function setAcessoTr($acesso_tr)
    {
        $this->acesso_tr = $acesso_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPortacfFca()
    {
        return $this->portacf_fca;
    }

    /**
     * @param mixed $portacf_fca
     *
     * @return self
     */
    public function setPortacfFca($portacf_fca)
    {
        $this->portacf_fca = $portacf_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPortacfSp()
    {
        return $this->portacf_sp;
    }

    /**
     * @param mixed $portacf_sp
     *
     * @return self
     */
    public function setPortacfSp($portacf_sp)
    {
        $this->portacf_sp = $portacf_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArcFca()
    {
        return $this->arc_fca;
    }

    /**
     * @param mixed $arc_fca
     *
     * @return self
     */
    public function setArcFca($arc_fca)
    {
        $this->arc_fca = $arc_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArcSp()
    {
        return $this->arc_sp;
    }

    /**
     * @param mixed $arc_sp
     *
     * @return self
     */
    public function setArcSp($arc_sp)
    {
        $this->arc_sp = $arc_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArcTr()
    {
        return $this->arc_tr;
    }

    /**
     * @param mixed $arc_tr
     *
     * @return self
     */
    public function setArcTr($arc_tr)
    {
        $this->arc_tr = $arc_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSistExtintFca()
    {
        return $this->sist_extint_fca;
    }

    /**
     * @param mixed $sist_extint_fca
     *
     * @return self
     */
    public function setSistExtintFca($sist_extint_fca)
    {
        $this->sist_extint_fca = $sist_extint_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSistExtintSp()
    {
        return $this->sist_extint_sp;
    }

    /**
     * @param mixed $sist_extint_sp
     *
     * @return self
     */
    public function setSistExtintSp($sist_extint_sp)
    {
        $this->sist_extint_sp = $sist_extint_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSistExtintTr()
    {
        return $this->sist_extint_tr;
    }

    /**
     * @param mixed $sist_extint_tr
     *
     * @return self
     */
    public function setSistExtintTr($sist_extint_tr)
    {
        $this->sist_extint_tr = $sist_extint_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLedsaudeFca()
    {
        return $this->ledsaude_fca;
    }

    /**
     * @param mixed $ledsaude_fca
     *
     * @return self
     */
    public function setLedsaudeFca($ledsaude_fca)
    {
        $this->ledsaude_fca = $ledsaude_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp01Fca()
    {
        return $this->temp01_fca;
    }

    /**
     * @param mixed $temp01_fca
     *
     * @return self
     */
    public function setTemp01Fca($temp01_fca)
    {
        $this->temp01_fca = $temp01_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid01Fca()
    {
        return $this->humid01_fca;
    }

    /**
     * @param mixed $humid01_fca
     *
     * @return self
     */
    public function setHumid01Fca($humid01_fca)
    {
        $this->humid01_fca = $humid01_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp01Sp()
    {
        return $this->temp01_sp;
    }

    /**
     * @param mixed $temp01_sp
     *
     * @return self
     */
    public function setTemp01Sp($temp01_sp)
    {
        $this->temp01_sp = $temp01_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid01Sp()
    {
        return $this->humid01_sp;
    }

    /**
     * @param mixed $humid01_sp
     *
     * @return self
     */
    public function setHumid01Sp($humid01_sp)
    {
        $this->humid01_sp = $humid01_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp02Fca()
    {
        return $this->temp02_fca;
    }

    /**
     * @param mixed $temp02_fca
     *
     * @return self
     */
    public function setTemp02Fca($temp02_fca)
    {
        $this->temp02_fca = $temp02_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid02Fca()
    {
        return $this->humid02_fca;
    }

    /**
     * @param mixed $humid02_fca
     *
     * @return self
     */
    public function setHumid02Fca($humid02_fca)
    {
        $this->humid02_fca = $humid02_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp02Sp()
    {
        return $this->temp02_sp;
    }

    /**
     * @param mixed $temp02_sp
     *
     * @return self
     */
    public function setTemp02Sp($temp02_sp)
    {
        $this->temp02_sp = $temp02_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid02Sp()
    {
        return $this->humid02_sp;
    }

    /**
     * @param mixed $humid02_sp
     *
     * @return self
     */
    public function setHumid02Sp($humid02_sp)
    {
        $this->humid02_sp = $humid02_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp03Fca()
    {
        return $this->temp03_fca;
    }

    /**
     * @param mixed $temp03_fca
     *
     * @return self
     */
    public function setTemp03Fca($temp03_fca)
    {
        $this->temp03_fca = $temp03_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid03Fca()
    {
        return $this->humid03_fca;
    }

    /**
     * @param mixed $humid03_fca
     *
     * @return self
     */
    public function setHumid03Fca($humid03_fca)
    {
        $this->humid03_fca = $humid03_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemp03Sp()
    {
        return $this->temp03_sp;
    }

    /**
     * @param mixed $temp03_sp
     *
     * @return self
     */
    public function setTemp03Sp($temp03_sp)
    {
        $this->temp03_sp = $temp03_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumid03Sp()
    {
        return $this->humid03_sp;
    }

    /**
     * @param mixed $humid03_sp
     *
     * @return self
     */
    public function setHumid03Sp($humid03_sp)
    {
        $this->humid03_sp = $humid03_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapUpsTr()
    {
        return $this->cap_ups_tr;
    }

    /**
     * @param mixed $cap_ups_tr
     *
     * @return self
     */
    public function setCapUpsTr($cap_ups_tr)
    {
        $this->cap_ups_tr = $cap_ups_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuminScFca()
    {
        return $this->lumin_sc_fca;
    }

    /**
     * @param mixed $lumin_sc_fca
     *
     * @return self
     */
    public function setLuminScFca($lumin_sc_fca)
    {
        $this->lumin_sc_fca = $lumin_sc_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPortacfScFca()
    {
        return $this->portacf_sc_fca;
    }

    /**
     * @param mixed $portacf_sc_fca
     *
     * @return self
     */
    public function setPortacfScFca($portacf_sc_fca)
    {
        $this->portacf_sc_fca = $portacf_sc_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcessoScFca()
    {
        return $this->acesso_sc_fca;
    }

    /**
     * @param mixed $acesso_sc_fca
     *
     * @return self
     */
    public function setAcessoScFca($acesso_sc_fca)
    {
        $this->acesso_sc_fca = $acesso_sc_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeradoresFca()
    {
        return $this->geradores_fca;
    }

    /**
     * @param mixed $geradores_fca
     *
     * @return self
     */
    public function setGeradoresFca($geradores_fca)
    {
        $this->geradores_fca = $geradores_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeradoresSp()
    {
        return $this->geradores_sp;
    }

    /**
     * @param mixed $geradores_sp
     *
     * @return self
     */
    public function setGeradoresSp($geradores_sp)
    {
        $this->geradores_sp = $geradores_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgExtFca()
    {
        return $this->org_ext_fca;
    }

    /**
     * @param mixed $org_ext_fca
     *
     * @return self
     */
    public function setOrgExtFca($org_ext_fca)
    {
        $this->org_ext_fca = $org_ext_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgExtSp()
    {
        return $this->org_ext_sp;
    }

    /**
     * @param mixed $org_ext_sp
     *
     * @return self
     */
    public function setOrgExtSp($org_ext_sp)
    {
        $this->org_ext_sp = $org_ext_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrgExtTr()
    {
        return $this->org_ext_tr;
    }

    /**
     * @param mixed $org_ext_tr
     *
     * @return self
     */
    public function setOrgExtTr($org_ext_tr)
    {
        $this->org_ext_tr = $org_ext_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZabbix()
    {
        return $this->zabbix;
    }

    /**
     * @param mixed $zabbix
     *
     * @return self
     */
    public function setZabbix($zabbix)
    {
        $this->zabbix = $zabbix;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsFca()
    {
        return $this->obs_fca;
    }

    /**
     * @param mixed $obs_fca
     *
     * @return self
     */
    public function setObsFca($obs_fca)
    {
        $this->obs_fca = $obs_fca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsSp()
    {
        return $this->obs_sp;
    }

    /**
     * @param mixed $obs_sp
     *
     * @return self
     */
    public function setObsSp($obs_sp)
    {
        $this->obs_sp = $obs_sp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsTr()
    {
        return $this->obs_tr;
    }

    /**
     * @param mixed $obs_tr
     *
     * @return self
     */
    public function setObsTr($obs_tr)
    {
        $this->obs_tr = $obs_tr;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChkCarro()
    {
        return $this->chk_carro;
    }

    /**
     * @param mixed $chk_carro
     *
     * @return self
     */
    public function setChkCarro($chk_carro)
    {
        $this->chk_carro = $chk_carro;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChkSala()
    {
        return $this->chk_sala;
    }

    /**
     * @param mixed $chk_sala
     *
     * @return self
     */
    public function setChkSala($chk_sala)
    {
        $this->chk_sala = $chk_sala;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChkNot()
    {
        return $this->chk_not;
    }

    /**
     * @param mixed $chk_not
     *
     * @return self
     */
    public function setChkNot($chk_not)
    {
        $this->chk_not = $chk_not;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChkCel()
    {
        return $this->chk_cel;
    }

    /**
     * @param mixed $chk_cel
     *
     * @return self
     */
    public function setChkCel($chk_cel)
    {
        $this->chk_cel = $chk_cel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChkBatcel()
    {
        return $this->chk_batcel;
    }

    /**
     * @param mixed $chk_batcel
     *
     * @return self
     */
    public function setChkBatcel($chk_batcel)
    {
        $this->chk_batcel = $chk_batcel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsNpo()
    {
        return $this->obs_npo;
    }

    /**
     * @param mixed $obs_npo
     *
     * @return self
     */
    public function setObsNpo($obs_npo)
    {
        $this->obs_npo = $obs_npo;

        return $this;
    }

    public function getChecks($ini, $max){

        $inicio = $ini;
		$maximo = $max;
        $sql = "SELECT * FROM `checklists` ORDER BY `data` DESC, `turno` DESC LIMIT $inicio, $maximo"; //consulta no BD
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;
    }
    
    public function getPesquisa($ini, $max, $pesquisa){

		$inicio = $ini;
		$maximo = $max;
		$param = $pesquisa;
		//$sql="SELECT * FROM acessos ORDER BY id DESC LIMIT $inicio, $maximo"; //consulta no BD
		$sql = "SELECT * FROM checklists WHERE id LIKE '%$param%' OR data LIKE '%$param%' OR turno LIKE '%$param%' OR obs_fca LIKE '%$param%' OR obs_sp LIKE '%$param%' OR obs_dr LIKE '%$param%' OR obs_tr LIKE '%$param%' OR obs_npo LIKE '%$param%' ORDER BY id DESC LIMIT $inicio, $maximo";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();

		$array = array();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();

			return $array;
		}

		return $array;

	}

	public function insertCheck($turno, $data, $operador_fca, $operador_sp, $operador_tr, $entrada_fca,
                                $saida_fca, $entrada_sp, $saida_sp, $entrada_tr, $saida_tr, $racks_fca,
                                $racks_sp, $racks_tr, $org_fca, $org_sp, $org_tr, $lumin_fca, $lumin_sp,
                                $lumin_tr, $infra_fca, $infra_sp, $infra_tr, $acesso_fca, $acesso_sp,
                                $acesso_tr, $portacf_fca, $portacf_sp, $arc_fca, $arc_sp, $arc_tr,
                                $sist_extint_fca, $sist_extint_sp, $sist_extint_tr, $ledsaude_fca,
                                $temp01_fca, $humid01_fca, $temp01_sp, $humid01_sp, $temp02_fca,
                                $humid02_fca, $temp02_sp, $humid02_sp, $temp03_fca, $humid03_fca,
                                $temp03_sp, $humid03_sp, $cap_ups_tr, $lumin_sc_fca, $portacf_sc_fca,
                                $acesso_sc_fca, $geradores_fca, $geradores_sp, $org_ext_fca, $org_ext_sp,
                                $org_ext_tr, $zabbix, $obs_fca, $obs_sp, $obs_tr, $chk_carro, $chk_sala,
                                $chk_not, $chk_cel, $chk_batcel, $obs_npo, 
                                $operador_dr, $entrada_dr, $saida_dr, $racks_dr, $org_dr, $lumin_dr, $infra_dr,
                                $acesso_dr, $portacf_dr, $arc_dr, $sist_extint_dr, $ledsaude_dr, $temp_dr,
                                $humid_dr, $org_ext_dr, $obs_dr){

                                    //echo $infra_dr."<br>";
                                    //echo $obs_dr."<br>";
                                    //echo $saida_dr."<br>";
                                    //echo $ledsaude_dr."<br>"; exit();
     $this->turno = $turno;
     $this->data = $data;
     $this->operador_fca = $operador_fca;
     $this->operador_sp = $operador_sp;
     $this->operador_tr = $operador_tr;
     $this->entrada_fca = $entrada_fca;
     $this->saida_fca = $saida_fca;
     $this->entrada_sp = $entrada_sp;
     $this->saida_sp = $saida_sp;
     $this->entrada_tr = $entrada_tr;
     $this->saida_tr = $saida_tr;
     $this->racks_fca = $racks_fca;
     $this->racks_sp = $racks_sp;
     $this->racks_tr = $racks_tr;
     $this->org_fca = $org_fca;
     $this->org_sp = $org_sp;
     $this->org_tr = $org_tr;
     $this->lumin_fca = $lumin_fca;
     $this->lumin_sp = $lumin_sp;
     $this->lumin_tr = $lumin_tr;
     $this->infra_fca = $infra_fca;
     $this->infra_sp = $infra_sp;
     $this->infra_tr = $infra_tr;
     $this->acesso_fca = $acesso_fca;
     $this->acesso_sp = $acesso_sp;
     $this->acesso_tr = $acesso_tr;
     $this->portacf_fca = $portacf_fca;
     $this->portacf_sp = $portacf_sp;
     $this->arc_fca = $arc_fca;
     $this->arc_sp = $arc_sp;
     $this->arc_tr = $arc_tr;
     $this->sist_extint_fca = $sist_extint_fca;
     $this->sist_extint_sp = $sist_extint_sp;
     $this->sist_extint_tr = $sist_extint_tr;
     $this->ledsaude_fca = $ledsaude_fca;
     $this->temp01_fca = $temp01_fca;
     $this->humid01_fca = $humid01_fca;
     $this->temp01_sp = $temp01_sp;
     $this->humid01_sp = $humid01_sp;
     $this->temp02_fca = $temp02_fca;
     $this->humid02_fca = $humid02_fca;
     $this->temp02_sp = $temp02_sp;
     $this->humid02_sp = $humid02_sp;
     $this->temp03_fca = $temp03_fca;
     $this->humid03_fca = $humid03_fca;
     $this->temp03_sp = $temp03_sp;
     $this->humid03_sp = $humid03_sp;
     $this->cap_ups_tr = $cap_ups_tr;
     $this->lumin_sc_fca = $lumin_sc_fca;
     $this->portacf_sc_fca = $portacf_sc_fca;
     $this->acesso_sc_fca = $acesso_sc_fca;
     $this->geradores_fca = $geradores_fca;
     $this->geradores_sp = $geradores_sp;
     $this->org_ext_fca = $org_ext_fca;
     $this->org_ext_sp = $org_ext_sp;
     $this->org_ext_tr = $org_ext_tr;
     $this->zabbix = $zabbix;
     $this->obs_fca = $obs_fca;
     $this->obs_sp = $obs_sp;
     $this->obs_tr =$obs_tr;
     $this->chk_carro = $chk_carro;
     $this->chk_sala = $chk_sala;
     $this->chk_not = $chk_not;
     $this->chk_cel = $chk_cel;
     $this->chk_batcel = $chk_batcel;
     $this->obs_npo = $obs_npo;
     $this->operador_dr = $operador_dr; /**Início DR */
     $this->entrada_dr = $entrada_dr;
     $this->saida_dr = $saida_dr;
     $this->racks_dr = $racks_dr;
     $this->org_dr = $org_dr;
     $this->lumin_dr = $lumin_dr;
     $this->infra_dr = $infra_dr;
     $this->acesso_dr = $acesso_dr;
     $this->portacf_dr = $portacf_dr;
     $this->arc_dr = $arc_dr;
     $this->sist_extint_dr = $sist_extint_dr;
     $this->ledsaude_dr = $ledsaude_dr;
     $this->temp_dr = $temp_dr;
     $this->humid_dr = $humid_dr;
     $this->org_ext_dr = $org_ext_dr;
     $this->obs_dr = $obs_dr;

     /*
	$sql = "INSERT INTO `checklists` (`turno`, `data`, `operador_fca`, `operador_sp`, `operador_tr`, `entrada_fca`, `saida_fca`, `entrada_sp`, `saida_sp`, `entrada_tr`, `saida_tr`, `racks_fca`, `racks_sp`, `racks_tr`, `org_fca`, `org_sp`, `org_tr`, `lumin_fca`, `lumin_sp`, `lumin_tr`, `infra_fca`, `infra_sp`, `infra_tr`, `acesso_fca`, `acesso_sp`, `acesso_tr`, `portacf_fca`, `portacf_sp`, `arc_fca`, `arc_sp`, `arc_tr`, `sist_extint_fca`, `sist_extint_sp`, `sist_extint_tr`, `ledsaude_fca`, `temp01_fca`, `humid01_fca`, `temp02_fca`, `humid02_fca`, `temp03_fca`, `humid03_fca`, `temp01_sp`, `humid01_sp`, `temp02_sp`, `humid02_sp`, `temp03_sp`, `humid03_sp`, `cap_ups_tr`, `lumin_sc_fca`, `portacf_sc_fca`, `acesso_sc_fca`, `geradores_fca`, `geradores_sp`, `org_ext_fca`, `org_ext_sp`, `org_ext_tr`, `zabbix`, `obs_fca`, `obs_sp`, `obs_tr`, `chk_carro`, `chk_sala`, `chk_not`, `chk_cel`, `chk_batcel`, `obs_npo`,
    `operador_dr`, `entrada_dr`, `saida_dr`, `racks_dr`, `org_dr`, `lumin_dr`, `infra_dr`, `acesso_dr`, `portacf_dr`, `arc_dr`,
    `sist_extint_dr`, `ledsaude_dr`, `temp_dr`, `humid_dr`, `org_ext_dr`, `obs_dr`) VALUES (
        '$this->turno',
        '$this->data',
        '$this->operador_fca',
        '$this->operador_sp',
        '$this->operador_tr',
        '$this->entrada_fca',
        '$this->saida_fca',
        '$this->entrada_sp',
        '$this->saida_sp',
        '$this->entrada_tr',
        '$this->saida_tr',
        '$this->racks_fca',
        '$this->racks_sp',
        '$this->racks_tr',
        '$this->org_fca',
        '$this->org_sp',
        '$this->org_tr',
        '$this->lumin_fca',
        '$this->lumin_sp',
        '$this->lumin_tr',
        '$this->infra_fca',
        '$this->infra_sp',
        '$this->infra_tr',
        '$this->acesso_fca',
        '$this->acesso_sp',
        '$this->acesso_tr',
        '$this->portacf_fca',
        '$this->portacf_sp',
        '$this->arc_fca',
        '$this->arc_sp',
        '$this->arc_tr',
        '$this->sist_extint_fca',
        '$this->sist_extint_sp',
        '$this->sist_extint_tr',
        '$this->ledsaude_fca',
        '$this->temp01_fca',
        '$this->humid01_fca',
        '$this->temp01_sp',
        '$this->humid01_sp',
        '$this->temp02_fca',
        '$this->humid02_fca',
        '$this->temp02_sp',
        '$this->humid02_sp',
        '$this->temp03_fca',
        '$this->humid03_fca',
        '$this->temp03_sp',
        '$this->humid03_sp',
        '$this->cap_ups_tr',
        '$this->lumin_sc_fca',
        '$this->portacf_sc_fca',
        '$this->acesso_sc_fca',
        '$this->geradores_fca',
        '$this->geradores_sp',
        '$this->org_ext_fca',
        '$this->org_ext_sp',
        '$this->org_ext_tr',
        '$this->zabbix',
        '$this->obs_fca',
        '$this->obs_sp',
        '$this->obs_tr',
        '$this->chk_carro',
        '$this->chk_sala',
        '$this->chk_not',
        '$this->chk_cel',
        '$this->chk_batcel',
        '$this->obs_npo',
        '$this->operador_dr',
        '$this->entrada_dr',
        '$this->saida_dr',
        '$this->racks_dr',
        '$this->org_dr',
        '$this->lumin_dr',
        '$this->infra_dr',
        '$this->acesso_dr',
        '$this->portacf_dr',
        '$this->arc_dr',
        '$this->sist_extint_dr',
        '$this->ledsaude_dr',
        '$this->temp_dr',
        '$this->humid_dr',
        '$this->org_ext_dr',
        '$this->obs_dr')";
        */

                                   /*
                                    echo $this->operador_dr."<br>";
                                    echo $this->entrada_dr."<br>";
                                    echo $this->saida_dr."<br>";
                                    echo $this->racks_dr."<br>";
                                    echo $this->org_dr."<br>";
                                    echo $this->lumin_dr."<br>";
                                    echo $this->infra_dr."<br>";
                                    echo $this->acesso_dr."<br>";
                                    echo $this->portacf_dr."<br>";
                                    echo $this->arc_dr."<br>";
                                    echo $this->sist_extint_dr."<br>";
                                    echo $this->ledsaude_dr."<br>";
                                    echo $this->temp_dr."<br>";
                                    echo $this->humid_dr."<br>";
                                    echo $this->org_ext_dr."<br>";
                                    echo $this->obs_dr."<br>"; exit();
                                    */
        /** Novos testes */

        $sql = "INSERT INTO checklists (turno, data, operador_fca, operador_sp, operador_dr, operador_tr,
        entrada_fca, saida_fca, entrada_sp, saida_sp, entrada_dr, saida_dr, entrada_tr, saida_tr, racks_fca,
        racks_sp, racks_dr, racks_tr, org_fca, org_sp, org_dr, org_tr, lumin_fca, lumin_sp, lumin_dr,
        lumin_tr, infra_fca, infra_sp, infra_dr, infra_tr, acesso_fca, acesso_sp, acesso_dr, acesso_tr,
        portacf_fca, portacf_sp, portacf_dr, arc_fca, arc_sp, arc_dr, arc_tr, sist_extint_fca, sist_extint_sp,
        sist_extint_dr, sist_extint_tr, ledsaude_fca, ledsaude_dr, temp01_fca, humid01_fca, temp02_fca,
        humid02_fca, temp03_fca, humid03_fca, temp01_sp, humid01_sp, temp02_sp, humid02_sp, temp03_sp,
        humid03_sp, temp_dr, humid_dr, cap_ups_tr, lumin_sc_fca, portacf_sc_fca, acesso_sc_fca, geradores_fca,
        geradores_sp, org_ext_fca, org_ext_sp, org_ext_dr, org_ext_tr, zabbix, obs_fca, obs_sp, obs_dr,
        obs_tr, chk_carro, chk_sala, chk_not, chk_cel, chk_batcel, obs_npo) VALUES ('$this->turno', '$this->data',
        '$this->operador_fca', '$this->operador_sp', '$this->operador_dr', '$this->operador_tr', '$this->entrada_fca',
        '$this->saida_fca', '$this->entrada_sp', '$this->saida_sp', '$this->entrada_dr', '$this->saida_dr', '$this->entrada_tr',
        '$this->saida_tr', '$this->racks_fca', '$this->racks_sp', '$this->racks_dr', '$this->racks_tr', '$this->org_fca',
        '$this->org_sp', '$this->org_dr', '$this->org_tr', '$this->lumin_fca', '$this->lumin_sp', '$this->lumin_dr',
        '$this->lumin_tr', '$this->infra_fca', '$this->infra_sp', '$this->infra_dr', '$this->infra_tr', '$this->acesso_fca',
        '$this->acesso_sp', '$this->acesso_dr', '$this->acesso_tr', '$this->portacf_fca', '$this->portacf_sp', '$this->portacf_dr',
        '$this->arc_fca', '$this->arc_sp', '$this->arc_dr', '$this->arc_tr', '$this->sist_extint_fca', '$this->sist_extint_sp',
        '$this->sist_extint_dr', '$this->sist_extint_tr', '$this->ledsaude_fca', '$this->ledsaude_dr', '$this->temp01_fca',
        '$this->humid01_fca', '$this->temp02_fca', '$this->humid02_fca', '$this->temp03_fca', '$this->humid03_fca',
        '$this->temp01_sp', '$this->humid01_sp', '$this->temp02_sp', '$this->humid02_sp', '$this->temp03_sp',
        '$this->humid03_sp', '$this->temp_dr', '$this->humid_dr', '$this->cap_ups_tr', '$this->lumin_sc_fca',
        '$this->portacf_sc_fca', '$this->acesso_sc_fca', '$this->geradores_fca', '$this->geradores_sp', '$this->org_ext_fca',
        '$this->org_ext_sp', '$this->org_ext_dr', '$this->org_ext_tr', '$this->zabbix', '$this->obs_fca', '$this->obs_sp',
        '$this->obs_dr', '$this->obs_tr', '$this->chk_carro', '$this->chk_sala', '$this->chk_not', '$this->chk_cel',
        '$this->chk_batcel', '$this->obs_npo')";

        /** END Novos testes */

        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        return true;
	}

    public function editCheck($i, $turno, $data, $operador_fca, $operador_sp, $operador_tr, $entrada_fca,
                                $saida_fca, $entrada_sp, $saida_sp, $entrada_tr, $saida_tr, $racks_fca,
                                $racks_sp, $racks_tr, $org_fca, $org_sp, $org_tr, $lumin_fca, $lumin_sp,
                                $lumin_tr, $infra_fca, $infra_sp, $infra_tr, $acesso_fca, $acesso_sp,
                                $acesso_tr, $portacf_fca, $portacf_sp, $arc_fca, $arc_sp, $arc_tr,
                                $sist_extint_fca, $sist_extint_sp, $sist_extint_tr, $ledsaude_fca,
                                $temp01_fca, $humid01_fca, $temp01_sp, $humid01_sp, $temp02_fca,
                                $humid02_fca, $temp02_sp, $humid02_sp, $temp03_fca, $humid03_fca,
                                $temp03_sp, $humid03_sp, $cap_ups_tr, $lumin_sc_fca, $portacf_sc_fca,
                                $acesso_sc_fca, $geradores_fca, $geradores_sp, $org_ext_fca, $org_ext_sp,
                                $org_ext_tr, $zabbix, $obs_fca, $obs_sp, $obs_tr, $chk_carro, $chk_sala,
                                $chk_not, $chk_cel, $chk_batcel, $obs_npo,
                                $operador_dr, $entrada_dr, $saida_dr, $racks_dr, $org_dr, $lumin_dr, $infra_dr,
                                $acesso_dr, $portacf_dr, $arc_dr, $sist_extint_dr, $ledsaude_dr, $temp_dr,
                                $humid_dr, $org_ext_dr, $obs_dr){

     $this->id = $i;
     $this->turno = $turno;
     $this->data = $data;
     $this->operador_fca = $operador_fca;
     $this->operador_sp = $operador_sp;
     $this->operador_tr = $operador_tr;
     $this->entrada_fca = $entrada_fca;
     $this->saida_fca = $saida_fca;
     $this->entrada_sp = $entrada_sp;
     $this->saida_sp = $saida_sp;
     $this->entrada_tr = $entrada_tr;
     $this->saida_tr = $saida_tr;
     $this->racks_fca = $racks_fca;
     $this->racks_sp = $racks_sp;
     $this->racks_tr = $racks_tr;
     $this->org_fca = $org_fca;
     $this->org_sp = $org_sp;
     $this->org_tr = $org_tr;
     $this->lumin_fca = $lumin_fca;
     $this->lumin_sp = $lumin_sp;
     $this->lumin_tr = $lumin_tr;
     $this->infra_fca = $infra_fca;
     $this->infra_sp = $infra_sp;
     $this->infra_tr = $infra_tr;
     $this->acesso_fca = $acesso_fca;
     $this->acesso_sp = $acesso_sp;
     $this->acesso_tr = $acesso_tr;
     $this->portacf_fca = $portacf_fca;
     $this->portacf_sp = $portacf_sp;
     $this->arc_fca = $arc_fca;
     $this->arc_sp = $arc_sp;
     $this->arc_tr = $arc_tr;
     $this->sist_extint_fca = $sist_extint_fca;
     $this->sist_extint_sp = $sist_extint_sp;
     $this->sist_extint_tr = $sist_extint_tr;
     $this->ledsaude_fca = $ledsaude_fca;
     $this->temp01_fca = $temp01_fca;
     $this->humid01_fca = $humid01_fca;
     $this->temp01_sp = $temp01_sp;
     $this->humid01_sp = $humid01_sp;
     $this->temp02_fca = $temp02_fca;
     $this->humid02_fca = $humid02_fca;
     $this->temp02_sp = $temp02_sp;
     $this->humid02_sp = $humid02_sp;
     $this->temp03_fca = $temp03_fca;
     $this->humid03_fca = $humid03_fca;
     $this->temp03_sp = $temp03_sp;
     $this->humid03_sp = $humid03_sp;
     $this->cap_ups_tr = $cap_ups_tr;
     $this->lumin_sc_fca = $lumin_sc_fca;
     $this->portacf_sc_fca = $portacf_sc_fca;
     $this->acesso_sc_fca = $acesso_sc_fca;
     $this->geradores_fca = $geradores_fca;
     $this->geradores_sp = $geradores_sp;
     $this->org_ext_fca = $org_ext_fca;
     $this->org_ext_sp = $org_ext_sp;
     $this->org_ext_tr = $org_ext_tr;
     $this->zabbix = $zabbix;
     $this->obs_fca = $obs_fca;
     $this->obs_sp = $obs_sp;
     $this->obs_tr =$obs_tr;
     $this->chk_carro = $chk_carro;
     $this->chk_sala = $chk_sala;
     $this->chk_not = $chk_not;
     $this->chk_cel = $chk_cel;
     $this->chk_batcel = $chk_batcel;
     $this->obs_npo = $obs_npo;
     $this->operador_dr = $operador_dr; /**Início DR */
     $this->entrada_dr = $entrada_dr;
     $this->saida_dr = $saida_dr;
     $this->racks_dr = $racks_dr;
     $this->org_dr = $org_dr;
     $this->lumin_dr = $lumin_dr;
     $this->infra_dr = $infra_dr;
     $this->acesso_dr = $acesso_dr;
     $this->portacf_dr = $portacf_dr;
     $this->arc_dr = $arc_dr;
     $this->sist_extint_dr = $sist_extint_dr;
     $this->ledsaude_dr = $ledsaude_dr;
     $this->temp_dr = $temp_dr;
     $this->humid_dr = $humid_dr;
     $this->org_ext_dr = $org_ext_dr;
     $this->obs_dr = $obs_dr;
                                    /*
                                    echo $this->operador_dr."<br>";
                                    echo $this->entrada_dr."<br>";
                                    echo $this->saida_dr."<br>";
                                    echo $this->racks_dr."<br>";
                                    echo $this->org_dr."<br>";
                                    echo $this->lumin_dr."<br>";
                                    echo $this->infra_dr."<br>";
                                    echo $this->acesso_dr."<br>";
                                    echo $this->portacf_dr."<br>";
                                    echo $this->arc_dr."<br>";
                                    echo $this->sist_extint_dr."<br>";
                                    echo $this->ledsaude_dr."<br>";
                                    echo $this->temp_dr."<br>";
                                    echo $this->humid_dr."<br>";
                                    echo $this->org_ext_dr."<br>";
                                    echo $this->obs_dr."<br>"; exit();
                                    */


     //$sql = "UPDATE `checklists` SET id = '$this->id', turno = '$this->turno', data = '$this->data', operador_fca = '$this->operador_fca', operador_sp = '$this->operador_sp', operador_tr = '$this->operador_tr', entrada_fca = '$this->entrada_fca', saida_fca = '$this->saida_fca', entrada_sp = '$this->entrada_sp', saida_sp = '$this->saida_sp', entrada_tr = '$this->entrada_tr', saida_tr = '$this->saida_tr', racks_fca = '$this->racks_fca', racks_sp = '$this->racks_sp', racks_tr = '$this->racks_tr', org_fca = '$this->org_fca', org_sp = '$this->org_sp', org_tr = '$this->org_tr', lumin_fca = '$this->lumin_fca', lumin_sp = '$this->lumin_sp', lumin_tr = '$this->lumin_tr', infra_fca = '$this->infra_fca', infra_sp = '$this->infra_sp', infra_tr = '$this->infra_tr', acesso_fca = '$this->acesso_fca', acesso_sp = '$this->acesso_sp', acesso_tr = '$this->acesso_tr', portacf_fca = '$this->portacf_fca', portacf_sp = '$this->portacf_sp', arc_fca = '$this->arc_fca', arc_sp = '$this->arc_sp', arc_tr = '$this->arc_tr', sist_extint_fca = '$this->sist_extint_fca', sist_extint_sp = '$this->sist_extint_sp', sist_extint_tr = '$this->sist_extint_tr', ledsaude_fca = '$this->ledsaude_fca', temp01_fca = '$this->temp01_fca', humid01_fca = '$this->humid01_fca', temp02_fca = '$this->temp02_fca', humid02_fca = '$this->humid02_fca', temp03_fca = '$this->temp03_fca', humid03_fca = '$this->humid03_fca', temp01_sp = '$this->temp01_sp', humid01_sp = '$this->humid01_sp', temp02_sp = '$this->temp02_sp', humid02_sp = '$this->humid02_sp', temp03_sp = '$this->temp03_sp', humid03_sp = '$this->humid03_sp', cap_ups_tr = '$this->cap_ups_tr', lumin_sc_fca = '$this->lumin_sc_fca', portacf_sc_fca = '$this->portacf_sc_fca', acesso_sc_fca = '$this->acesso_sc_fca', geradores_fca = '$this->geradores_fca', geradores_sp = '$this->geradores_sp', org_ext_fca = '$this->org_ext_fca', org_ext_sp = '$this->org_ext_sp', org_ext_tr = '$this->org_ext_tr', zabbix = '$this->zabbix', obs_fca = '$this->obs_fca', obs_sp = '$this->obs_sp', obs_tr = '$this->obs_tr', chk_carro = '$this->chk_carro', chk_sala = '$this->chk_sala', chk_not = '$this->chk_not', chk_cel = '$this->chk_cel', chk_batcel = '$this->chk_batcel', obs_npo = '$this->obs_npo' WHERE id = '$this->id'";
     //$sql = "UPDATE `checklists` SET turno = '$this->turno', data = '$this->data', operador_fca = '$this->operador_fca', operador_sp = '$this->operador_sp', operador_tr = '$this->operador_tr', entrada_fca = '$this->entrada_fca', saida_fca = '$this->saida_fca', entrada_sp = '$this->entrada_sp', saida_sp = '$this->saida_sp', entrada_tr = '$this->entrada_tr', saida_tr = '$this->saida_tr', racks_fca = '$this->racks_fca', racks_sp = '$this->racks_sp', racks_tr = '$this->racks_tr', org_fca = '$this->org_fca', org_sp = '$this->org_sp', org_tr = '$this->org_tr', lumin_fca = '$this->lumin_fca', lumin_sp = '$this->lumin_sp', lumin_tr = '$this->lumin_tr', infra_fca = '$this->infra_fca', infra_sp = '$this->infra_sp', infra_tr = '$this->infra_tr', acesso_fca = '$this->acesso_fca', acesso_sp = '$this->acesso_sp', acesso_tr = '$this->acesso_tr', portacf_fca = '$this->portacf_fca', portacf_sp = '$this->portacf_sp', arc_fca = '$this->arc_fca', arc_sp = '$this->arc_sp', arc_tr = '$this->arc_tr', sist_extint_fca = '$this->sist_extint_fca', sist_extint_sp = '$this->sist_extint_sp', sist_extint_tr = '$this->sist_extint_tr', ledsaude_fca = '$this->ledsaude_fca', temp01_fca = '$this->temp01_fca', humid01_fca = '$this->humid01_fca', temp02_fca = '$this->temp02_fca', humid02_fca = '$this->humid02_fca', temp03_fca = '$this->temp03_fca', humid03_fca = '$this->humid03_fca', temp01_sp = '$this->temp01_sp', humid01_sp = '$this->humid01_sp', temp02_sp = '$this->temp02_sp', humid02_sp = '$this->humid02_sp', temp03_sp = '$this->temp03_sp', humid03_sp = '$this->humid03_sp', cap_ups_tr = '$this->cap_ups_tr', lumin_sc_fca = '$this->lumin_sc_fca', portacf_sc_fca = '$this->portacf_sc_fca', acesso_sc_fca = '$this->acesso_sc_fca', geradores_fca = '$this->geradores_fca', geradores_sp = '$this->geradores_sp', org_ext_fca = '$this->org_ext_fca', org_ext_sp = '$this->org_ext_sp', org_ext_tr = '$this->org_ext_tr', zabbix = '$this->zabbix', obs_fca = '$this->obs_fca', obs_sp = '$this->obs_sp', obs_tr = '$this->obs_tr', chk_carro = '$this->chk_carro', chk_sala = '$this->chk_sala', chk_not = '$this->chk_not', chk_cel = '$this->chk_cel', chk_batcel = '$this->chk_batcel', obs_npo = '$this->obs_npo' WHERE id = '$this->id'";
    
    $sql = "UPDATE
     `checklists`
    SET
     turno = '$this->turno',
     data = '$this->data',
     operador_fca = '$this->operador_fca',
     operador_sp = '$this->operador_sp',
     operador_dr = '$this->operador_dr',
     operador_tr = '$this->operador_tr',
     entrada_fca = '$this->entrada_fca',
     saida_fca = '$this->saida_fca',
     entrada_sp = '$this->entrada_sp',
     saida_sp = '$this->saida_sp',
     entrada_dr = '$this->entrada_dr',
     saida_dr = '$this->saida_dr',
     entrada_tr = '$this->entrada_tr',
     saida_tr = '$this->saida_tr',
     racks_fca = '$this->racks_fca',
     racks_sp = '$this->racks_sp',
     racks_dr = '$this->racks_dr',
     racks_tr = '$this->racks_tr',
     org_fca = '$this->org_fca',
     org_sp = '$this->org_sp',
     org_dr = '$this->org_dr',
     org_tr = '$this->org_tr',
     lumin_fca = '$this->lumin_fca',
     lumin_sp = '$this->lumin_sp',
     lumin_dr = '$this->lumin_dr',
     lumin_tr = '$this->lumin_tr',
     infra_fca = '$this->infra_fca',
     infra_sp = '$this->infra_sp',
     infra_dr = '$this->infra_dr',
     infra_tr = '$this->infra_tr',
     acesso_fca = '$this->acesso_fca',
     acesso_sp = '$this->acesso_sp',
     acesso_dr = '$this->acesso_dr',
     acesso_tr = '$this->acesso_tr',
     portacf_fca = '$this->portacf_fca',
     portacf_sp = '$this->portacf_sp',
     portacf_dr = '$this->portacf_dr',
     arc_fca = '$this->arc_fca',
     arc_sp = '$this->arc_sp',
     arc_dr = '$this->arc_dr',
     arc_tr = '$this->arc_tr',
     sist_extint_fca = '$this->sist_extint_fca',
     sist_extint_sp = '$this->sist_extint_sp',
     sist_extint_dr = '$this->sist_extint_dr',
     sist_extint_tr = '$this->sist_extint_tr',
     ledsaude_fca = '$this->ledsaude_fca',
     ledsaude_dr = '$this->ledsaude_dr',
     temp01_fca = '$this->temp01_fca',
     humid01_fca = '$this->humid01_fca',
     temp02_fca = '$this->temp02_fca',
     humid02_fca = '$this->humid02_fca',
     temp03_fca = '$this->temp03_fca',
     humid03_fca = '$this->humid03_fca',
     temp01_sp = '$this->temp01_sp',
     humid01_sp = '$this->humid01_sp',
     temp02_sp = '$this->temp02_sp',
     humid02_sp = '$this->humid02_sp',
     temp03_sp = '$this->temp03_sp',
     humid03_sp = '$this->humid03_sp',
     temp_dr = '$this->temp_dr',
     humid_dr = '$this->humid_dr',
     cap_ups_tr = '$this->cap_ups_tr',
     lumin_sc_fca = '$this->lumin_sc_fca',
     portacf_sc_fca = '$this->portacf_sc_fca',
     acesso_sc_fca = '$this->acesso_sc_fca',
     geradores_fca = '$this->geradores_fca',
     geradores_sp = '$this->geradores_sp',
     org_ext_fca = '$this->org_ext_fca',
     org_ext_sp = '$this->org_ext_sp',
     org_ext_dr = '$this->org_ext_dr',
     org_ext_tr = '$this->org_ext_tr',
     zabbix = '$this->zabbix',
     obs_fca = '$this->obs_fca',
     obs_sp = '$this->obs_sp',
     obs_dr = '$this->obs_dr',
     obs_tr = '$this->obs_tr',
     chk_carro = '$this->chk_carro',
     chk_sala = '$this->chk_sala',
     chk_not = '$this->chk_not',
     chk_cel = '$this->chk_cel',
     chk_batcel = '$this->chk_batcel',
     obs_npo = '$this->obs_npo'
    WHERE
     id = '$this->id'";

    $sql = $this->pdo->prepare($sql);
    $sql->execute();

    return true;

    }

    public function getLastReg(){

        $sql = "SELECT * FROM checklists ORDER BY id DESC limit 1";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        $array = array();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();

            return $array;
        }

        return $array;
    }
    public function getCheck($i){
        $id = $i;
        $sql = "SELECT * FROM checklists WHERE id  = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $i);
        $sql->execute();

        $array = array();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();

            return $array;
        }

        return $array;
    }
}

