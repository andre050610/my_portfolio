<h1>main.java</h1>
<?php
$code = str_replace('<','&lt;','/*
Jonathan Aguirre
4/3/2014
Online Retailer 
FINAL PROJECT
 */

package online.retailer;

import java.util.Scanner;
import java.util.ArrayList;
import java.util.Iterator;
public class OnlineRetailer 
{
    private static ArrayList<IBuyer> buyers = new ArrayList<IBuyer>();
    private static ArrayList<IItem> items = new ArrayList<IItem>();
    
    public static void main(String[] args) 
    {
        Scanner input = new Scanner(System.in);
        
        String name;        // Name of buyer.
        String password;        // Buyer\'s password.
        
        initializeInventory();      // Initializes the items.
        
        do
        {
            while (true)
            {
                name = getName(input);      // Gets the name from buyer.
                password = getPassword(input);      // Gets the password from buyer.
                
                if (!name.equals("0") && !password.equals("0"))
                {
                    if (getUser(name, password) == null)
                    {   
                        System.out.println("\n\t\tName and password not existing!");
                        System.out.print("\nWould you like to create an account (Y/N): ");
                        if (input.next().equalsIgnoreCase("Y"))
                        {
                            System.out.println("\tCreating a new account...\n");
                            buyers.add(createAccount(name, password, input));        // Creates an account and adds to the buyer list.
                        }

                        else
                        {   
                            break;      
                        }
                    }

                    else 
                    {
                        ItemsForSale(input, name,  password);       // Displays the items for sale.
                    }
                }
                
                else 
                {
                    break;      // Ends the program.
                }
            }
        }while(!name.equals("0") && !password.equals("0"));
    }
    
    //***********************
    // Creates an account.  *
    //***********************
    public static IBuyer createAccount(String name, String password, Scanner input)
    {
        System.out.print("Please enter your annual income: $");
        if (input.nextDouble() < 50000.00)
        {   
            Standard stand = new Standard(name, password);
            System.out.println("\n~Your " + stand.getType() + " member has been created!~\n\n"
                    + "\tSPENDING LIMIT: $"+stand.getLimit()+"\n\tNAME: "+name+"\n\tPASSWORD: "+password);
            return stand;
        }

        else
        {
            Gold gold = new Gold(name, password);
            System.out.println("\n~Your " + gold.getType() + " member has been created!~\n\n"
                    + "\tSPENDING LIMIT: $"+gold.getLimit()+"\n\tNAME: "+name+"\n\tPASSWORD: "+password);
            return gold;
        }
       
    }
    
    //********************************
    // Gets the name from buyer.     *
    //********************************
    public static String getName(Scanner input)
    {
        System.out.print("\n\n********************************************************\n"
                        +"\t\tLOGIN\n"
                        +"********************************************************\n"
                        + "~~If you wish to close the program enter \'0\' for \n"
                        + "name and password~~\n\n");
        System.out.print("Please enter your name: ");
        return input.next();
    }
    
    //***********************************
    // Gets the password from buyer.    *
    //***********************************
    public static String getPassword(Scanner input)
    {
        System.out.print("Please enter your password: ");
        return input.next();
    }
            
    //***********************
    // Registered buyers.   *
    //***********************
    public static IBuyer getUser(String name,String password)
    {      
        if (!(buyers.isEmpty()))
        {
            for (int count = 0; count < buyers.size(); count ++)
            {
                if (buyers.get(count).getName().equals(name) && buyers.get(count).getPassword().equals(password))
                {
                    return buyers.get(count);
                }    
            }
            return null;
        }
        
        else
        {
            return null;
        }
    }
    
    
    //***************************
    // Initializes the items.   *
    //***************************
    public static void initializeInventory()
    {   
        for (int count = 0; count < 4; count++)
        {
            Appliance app = new Appliance();
            app.setName("Dryer 5000");
            app.setPrice(500.00);
            items.add(app);
        }
        
        for (int count = 0; count < 10; count++)
        {
            Appliance app = new Appliance();
            app.setName("Heat Wave");
            app.setPrice(199.00);
            items.add(app);
        }
        
        for (int count = 0; count < 20; count++)
        {
            Electronic elect = new Electronic();
            elect.setName("XBox 750");
            elect.setPrice(499.00);
            items.add(elect);
        }
        
        for (int count = 0; count < 7; count++)
        {
            Electronic elect = new Electronic();
            elect.setName("Sony Plasma");
            elect.setPrice(1500.00);
            items.add(elect);
        }
    }
    //*******************************
    // Shows the items for sale.    *
    //*******************************
    public static void ItemsForSale(Scanner input, String name, String password)
    {
        int option;
        
        if (!(buyers.isEmpty()))
        {
            for (int count = 0; count < buyers.size(); count ++)
            {
                if (buyers.get(count).getName().equals(name) && buyers.get(count).getPassword().equals(password))
                {
                    do
                    {
                        int item1 = 0;
                        int item2 = 0;
                        int item3 = 0;
                        int item4 = 0;
                        
                        for (int count2 = 0; count2 < items.size(); count2 ++)
                        {
                            if (items.get(count2).getName().equals("Dryer 5000"))
                            {
                                item1 += 1;
                            }
                            
                            else if (items.get(count2).getName().equals("Heat Wave"))
                            {
                                item2 += 1;
                            }
                            
                            else if (items.get(count2).getName().equals("XBox 750"))
                            {
                                item3 += 1;
                            }
                            
                            else if (items.get(count2).getName().equals("Sony Plasma"))
                            {
                                item4 += 1;
                            }
                        }
                        
                        System.out.print("\n\tAVAILABLE LIMIT: $"+buyers.get(count).getLimit()+"\n"
                                        + "*********************************************************\n"
                                        + "\t ITEMS TO BUY\t\tPRICE\t\tQUANTITY\n"
                                        + "*********************************************************\n"
                                        + "\t1 - Dryer 5000\t\t$500.00\t\t   "+item1+"\n"
                                        + "\t2 - Heat Wave\t\t$199.00\t\t   "+item2+"\n"
                                        + "\t3 - XBox 750\t\t$499.00\t\t   "+item3+"\n"
                                        + "\t4 - Sony Plasma\t\t$1500.00\t   "+item4+"\n"
                                        + "\t5 - Checkout\n\n"
                                        + "Please enter your option: ");
                        
                        do
                        {
                            option = input.nextInt();
                            if (validateOption(option))
                            {   
                                addToCheckoutList(option, buyers.get(count));
                                break;
                            }

                            else
                            {   
                                System.out.print("\tSorry! Invalid option...\n"
                                        + "Please re-enter your option: ");
                            }
                        }while(true);
                        
                    }while (option != 5);
                }    
            }
        }
    }
    
    //*******************************************
    // Validates the option inputed from user.  *
    //*******************************************
    private static Boolean validateOption(int option)
    {   
        if (option > 0 && option < 6)
        {
            return true;
        }
        
        else 
        {
            return false;
        }
    }
    
    //***************************************
    // Adds an item to their checkout list. *
    //***************************************
    private static void addToCheckoutList(int option, IBuyer buyerItem)
    {   
        switch(option)
        {
            case 1: findItemList("Dryer 5000", buyerItem);
                    break;
            case 2: findItemList("Heat Wave", buyerItem);
                    break;
            case 3: findItemList("XBox 750", buyerItem);
                    break;
            case 4: findItemList("Sony Plasma", buyerItem);
                    break;
            case 5: checkout(buyerItem);
                    break;
        }        
    }
                
    //***************************************            
    // Find item in the list to add.        *
    //***************************************
    private static void findItemList(String itemName, IBuyer buyerItem)
    {
        Boolean inStock = false;       // In stock to sell.
       
        if (!(items.isEmpty()))
        {
            for (int count = 0; count < items.size(); count ++)
            {
                if (items.get(count).getName().equals(itemName))
                {
                    inStock = true;     // If item in stock.
                    
                    if (buyerItem.validateLimit(items.get(count).getPrice()))       // Validates the amount of spanding limit.
                    {
                        buyerItem.subtractLimit(items.get(count).getPrice());       // Subracts to the limit.
                        buyerItem.addItem(items.get(count));    // Adds item to the member list.
                        items.remove(items.get(count));     // Removes the item from inventory.
                        System.out.println("\n\nAdded \'"+itemName+"\' to your checkout list.");
                    }
                    
                    else
                    {   
                        System.out.println("\tSorry! Item will go over on your spending limit!");
                    } 
                    break;
                }
            }

            if (inStock == false)
            {
                System.out.println("\tSorry! Out of Stock.");
            }
        }
       
        else
        {
            System.out.println("\t\tSorry! Online store in closed...\n "
                    + "\t\tOut of Stock on all items!");
        }
    }
    
    //***********************************
    // Checkout for items selected.     *
    //***********************************
    private static void checkout(IBuyer buyerItem)
    {
        ArrayList <IItem> checkoutList = buyerItem.getCheckoutList();
        
        double totalPriceItems = 0;
        double electronicShipCost = 0;
        double applianceShipCost = 0;
        double totalShipCost = 0;
        
        if (!checkoutList.isEmpty())
        {
            for (int count = 0; count < checkoutList.size(); count ++)
            {
                if (checkoutList.get(count).getName().equals("Dryer 5000"))
                {
                    applianceShipCost = 100.00;
                    totalPriceItems += checkoutList.get(count).getPrice();
                }
                
                else if (checkoutList.get(count).getName().equals("Heat Wave"))
                {
                    if (applianceShipCost == 0)
                    {
                        applianceShipCost = 45.00;
                    }
                    
                    else 
                    {
                        applianceShipCost = 100.00;
                    }
                    
                    totalPriceItems += checkoutList.get(count).getPrice();
                }
                
                else if (checkoutList.get(count).getName().equals("XBox 750"))
                {
                    electronicShipCost = 75.00;
                    totalPriceItems += checkoutList.get(count).getPrice();
                }
                
                else if (checkoutList.get(count).getName().equals("Sony Plasma"))
                {
                    electronicShipCost = 75.00;
                    totalPriceItems += checkoutList.get(count).getPrice();
                }
            }
            
            if (electronicShipCost == 0)
            {
                totalShipCost = applianceShipCost;      // Total ship cost if no bought electronics.
            }
            
            else if (applianceShipCost ==0)
            {
                totalShipCost = electronicShipCost;     // Total ship cost if no bought appliance.
            }
            
            else
            {
                totalShipCost = (electronicShipCost + applianceShipCost)/2;     // Total ship cost.
            }
            
            System.out.println("*********************************************************\n"
                                + "\t\tCHECKOUT\n"
                                + "*********************************************************\n");
            System.out.printf("%s%.2f%s%.2f%s%.2f", "\tSHIPPING COST: $",totalShipCost, "\n\tITEMS PRICE:   $",
                                totalPriceItems, "\n\t-------------------------\n\tTOTAL:\t\t$", totalShipCost+totalPriceItems );
        }
        
        else
        {
            System.out.println("\n\tYou have no items in your checkout list!");
        }
        
        buyerItem.clearCheckoutList();      // Clears the checkout list of memeber.
    }
}'
);

echo($code);
?>


