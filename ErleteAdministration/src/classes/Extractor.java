/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Extractor {

    /**
     * 
     * The attributes of Extractor
     */
    private int id;
    private LocalDate date;
    private String email;

    /**
     *
     * The constructor of Extractor
     *
     * In this constructor it is going to be saved an id, the date where the
     * extractor is going to be used, and the email of the person who has booked
     *
     * @param id
     * @param date
     * @param email
     */
    public Extractor(int id, String date, String email) {
        this.id = id;
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
        this.email = email;
    }

    /**
     *
     * @return the id of the booking
     */
    public int getId() {
        return id;
    }

    /**
     *
     * @return the date of the booking
     */
    public LocalDate getDate() {
        return date;
    }

    /**
     * 
     * @return the email of the person who is going to use the Extractor
     */
    public String getEmail() {
        return email;
    }

    /**
     * 
     * Changes the id of the booking
     * @param id 
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * 
     * Changes the date of the booking
     * @param date 
     */
    public void setDate(String date) {
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    /**
     * 
     * Changes the email of the person who is going to use the Extractor
     * @param email 
     */
    public void setEmail(String email) {
        this.email = email;
    }
    
    /**
     * 
     * Proves if the email has an at sign
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
