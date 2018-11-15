package com.networking11.com.week12networking_wildan.Model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;
import java.util.List;

public class ResultPembeli {
    @SerializedName("status")
    private String status;
    @SerializedName("result")
    List<Pembeli> listDataPembeli;
    @SerializedName("message")
    private String message;
    public ResultPembeli() {}

    public String getStatus() {
        return status;
    }
    public void setStatus(String status) {
        this.status = status;
    }

    public List<Pembeli> getListDataPembeli() {
        return listDataPembeli;
    }

    public void setListDataPembeli(List<Pembeli> listDataPembeli) {
        this.listDataPembeli = listDataPembeli;
    }

    public String getMessage() {
        return message;
    }
    public void setMessage(String message) {
        this.message = message;
    }
}
