<?php
class Products
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'name' => 'First Name',
            'category' => 'Last Name',
            'cost' => 'Price',
            'status' => 'Status'
        ];

        return $ordering;
    }
}
?>
