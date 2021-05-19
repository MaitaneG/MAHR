/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package base_classes;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author gallastegui.maitane
 */
public class Fee {

    /**
     *
     * The attributes of the class
     */
    private int id;
    private int year;
    private boolean payed;
    private String email;

    /**
     *
     * The constructor of the class
     *
     * It is going to be saved an id, the year of the fee, if it has been payed,
     * and who has to pay it
     *
     * @param id
     * @param year
     * @param payed
     * @param email
     */
    public Fee(int id, int year, boolean payed, String email) {
        this.id = id;
        this.year = year;
        this.payed = payed;
        this.email = email;
    }

    /**
     * 
     * @return the id of the Fee
     */
    public int getId() {
        return id;
    }

    /**
     * 
     * @return the year of the Fee
     */
    public int getYear() {
        return year;
    }

    /**
     * 
     * @return if the Fee has been payed or not  
     */
    public boolean isPayed() {
        return payed;
    }

    /**
     * 
     * @return who has to pay the Fee
     */
    public String getEmail() {
        return email;
    }

    /**
     * 
     * Changes the id of the Fee
     * 
     * @param id 
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * 
     * Changes the year of the Fee
     * 
     * @param year 
     */
    public void setYear(int year) {
        this.year = year;
    }

    /**
     * 
     * Changes if the Fee has been payed or not  
     * 
     * @param payed 
     */
    public void setPayed(boolean payed) {
        this.payed = payed;
    }

    /**
     * 
     * Changes who has to pay the Fee
     * 
     * @param email 
     */
    public void setEmail(String email) {
        this.email = email;
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
