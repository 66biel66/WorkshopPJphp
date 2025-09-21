<?php

namespace service;

use dao\mysql\WorkshopsDAO;

class WorkshopsService extends WorkshopsDAO
{
    public function listarWorkshop($id)
    {
        return parent::listarWorkshop($id);
    }
    public function listarUsuarios($workshop_id)
    {
        return parent::listarUsuarios($workshop_id);
    }
}
