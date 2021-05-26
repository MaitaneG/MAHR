/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package base_classes;

import java.time.LocalDate;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Accounts {

    /**
     *
     * All the attributes of Accounts
     */
    private int id;
    private String payer;
    private String collector;
    private LocalDate date;
    private float amount;
    private String concept;
    private float total;

    /**
     *
     * The constructor of Accounts
     *
     * In this class we are going to save an id, who has payed, who has received
     * the money, the date the payment has been done, how much money has been
     * payed, the concept of the payment and the total money of the
     * association's account.
     *
     * @param id
     * @param payer
     * @param collector
     * @param date
     * @param amount
     * @param concept
     * @param total
     */
    public Accounts(int id, String payer, String collector, String date, float amount, String concept, float total) {
        this.id = id;
        this.payer = payer;
        this.collector = collector;
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
        this.amount = amount;
        this.concept = concept;
        this.total = total;
    }

    /**
     *
     * @return the id of the Accounts
     */
    public int getId() {
        return id;
    }

    /**
     *
     * @return the payer of money of the Accounts
     */
    public String getPayer() {
        return payer;
    }

    /**
     *
     * @return the collector of money of the Accounts
     */
    public String getCollector() {
        return collector;
    }

    /**
     *
     * @return the Date where the Accounts have been done
     */
    public LocalDate getDate() {
        return date;
    }

    /**
     *
     * @return the amount of money of the Accounts
     */
    public float getAmount() {
        return amount;
    }

    /**
     *
     * @return the total money of the association money
     */
    public float getTotal() {
        return total;
    }

    /**
     *
     * @return the concept of the payment
     */
    public String getConcept() {
        return concept;
    }

    /**
     *
     * Changes the id of the Accounts
     *
     * @param id
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     *
     * Changes the payer of the of money of the Accounts
     *
     * @param payer
     */
    public void setPayer(String payer) {
        this.payer = payer;
    }

    /**
     *
     * Changes the collector of the of money of the Accounts
     *
     * @param collector
     */
    public void setCollector(String collector) {
        this.collector = collector;
    }

    /**
     *
     * Changes the Date where the Accounts have been done
     *
     * @param date
     */
    public void setDate(String date) {
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    /**
     *
     * Changes the amount of money of the Accounts
     *
     * @param amount
     */
    public void setAmount(float amount) {
        this.amount = amount;
    }

    /**
     *
     * Changes the total money of the association money
     *
     * @param total
     */
    public void setTotal(float total) {
        this.total = total;
    }

    /**
     *
     * Changes the concept of the payment
     *
     * @param concept
     */
    public void setConcept(String concept) {
        this.concept = concept;
    }

    /**
     *
     * Proves if the email has an at sign
     *
     * @param mail
     * @return 1 if the email has a correct format and 0 if not
     */
    public boolean isCorrectEmail(String mail) {
        Pattern pat = Pattern.compile("^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@"
                + "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
        Matcher mather = pat.matcher(mail);
        return mather.find();
    }
}
