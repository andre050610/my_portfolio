<h1>standard.java</h1>
<?php
$code = str_replace('<','&lt;','package online.retailer;

import java.util.ArrayList;

public class Standard implements IBuyer
{
    private String name;        // Name of the member.
    private String password;    // Member\'s passwords.
    private String type;        // Type of the member.
    private double limit;       // Spending limit $1000.00.
    private ArrayList<IItem> checkout;     // List for items bought.
    
    //***************************************************
    // Constructor: Sets the name, password, and type.  *
    //***************************************************
    public Standard(String name, String password)
    {   
        this.checkout = new ArrayList<IItem>();
        this.name = name;
        this.password = password;
        this.type = "Standard";
        this.limit = 1000.00;
    }
    
    //***********************************
    // Returns the type of the member.  *
    //***********************************
    public String getType()
    {
        return type;
    }
    
    //*******************
    // Gets the name.   *
    //*******************
     @Override
    public String getName()
    {   
        return this.name;
    }
    
    //***********************
    // Gets the password.   *
    //***********************
     @Override
    public String getPassword()
    {   
        return this.password;
    }
    
    //*******************
    // Sets the name.   *
    //*******************
     @Override
    public void setName(String name)
    {
        this.name = name;
    }
    
    //***********************
    // Sets the password.   *
    //***********************
     @Override
    public void setPassword(String password)
    {
        this.password = password;
    }
    
    @Override
    //*******************************
    // Adds item to checkout list.  *
    //*******************************
    public void addItem(IItem item)
    {   
        checkout.add(item);
    }
    
    @Override
    //***************************************
    // Validates enough limit to buy item.  *
    //***************************************
    public Boolean validateLimit(double amountItem)
    {   
        if ((limit - amountItem) >= 0)
        {
            return true;
        }
        
        else 
        {
            return false;
        }
    }
    
    @Override
    //***************************************************
    // Substracts the limit from the limit spendings.   *
    //***************************************************
    public void subtractLimit(double amountItem)
    {
        this.limit -= amountItem;
    }
    
    @Override
    //***********************************
    // Gets the limit for the buyer.    *
    //***********************************
    public double getLimit()
    {
        return this.limit;
    }
    
    @Override
    //*******************************
    // Gets the list of checkout.   *
    //*******************************
    public ArrayList<IItem> getCheckoutList()
    {
        return this.checkout;
    }
    
    @Override
    //*******************************
    // Clears the checkout list.    *
    //*******************************
    public void clearCheckoutList()
    {
        this.checkout.clear();
    }
}'
);

echo($code);
?>
