<h1>appliance.java</h1>
<?php
$code = str_replace('<','&lt;','package online.retailer;

public class Appliance implements IItem 
{
    public String name;     // Name of item.
    public double price;        // Price of item.
    
    //***********************************************
    // Constructor: Sets the name and the price.    *
    //***********************************************
    public Appliance()
    {
        this.name = " ";
        this.price = 0;
    }
    
    //***************************
    // Gets the name of item.   *
    //***************************
    @Override
    public String getName()
    {
        return this.name;
    }
    
    //*******************************
    // Gets the price of the item.  *
    //*******************************
    @Override
    public double getPrice()
    {   
        return this.price;
    }
    
    //*******************************
    // Sets the name of the item.   *
    //*******************************
    @Override
    public void setName(String name)
    {
        this.name = name;
    }
    
    //*******************************
    // Sets the price of the item.  *
    //*******************************
    @Override
    public void setPrice(double price)
    {
        this.price = price;
    }
}'
);

echo($code);
?>
