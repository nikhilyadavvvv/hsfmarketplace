<?php
class Costumers
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
            'user_id' => 'ID',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'is_seller' => 'Seller',
            'is_buyer' => 'Buyer',
            'status' => 'status',
        ];

        return $ordering;
    }
}
?>
