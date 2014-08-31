<?php

class BomForm extends BaseForm
{
    public function isValidForAdd()
    {
        return $this->isValid([
            "id" => "required"
        ]);
    }

    public function isValidForEdit()
    {
        return $this->isValid([
            "id"   => "exists:lab_products,id",
        ]);
    }

    public function isValidForDelete()
    {
        return $this->isValid([
            "id" => "exists:lab_products,id"
        ]);
    }
}