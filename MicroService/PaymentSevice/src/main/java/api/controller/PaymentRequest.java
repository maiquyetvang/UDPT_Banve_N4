package api.controller;

public class PaymentRequest {
    private String amount;
    private String bankCode;
    private String language;

    // Constructors
    public PaymentRequest() {
    }

    public PaymentRequest(String amount, String bankCode, String language) {
        this.amount = amount;
        this.bankCode = bankCode;
        this.language = language;
    }

    // Getters và Setters
    public String getAmount() {
        return amount;
    }

    public void setAmount(String amount) {
        this.amount = amount;
    }

    public String getBankCode() {
        return bankCode;
    }

    public void setBankCode(String bankCode) {
        this.bankCode = bankCode;
    }

    public String getLanguage() {
        return language;
    }

    public void setLanguage(String language) {
        this.language = language;
    }
}
