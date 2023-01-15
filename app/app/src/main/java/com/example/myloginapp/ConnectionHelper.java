package com.example.myloginapp;

import android.os.StrictMode;
import android.util.Log;

import java.sql.Connection;

public class ConnectionHelper {
    Connection con;
    String uname, pass, ip, port, database;

    public Connection connectionclass(){
        ip = "172.0.0.1";
        database = "apptest";


        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        Connection connection = null;
        String ConnectionURL = null;

        try
        {
            Class.forName("net.source.jtds.jdbc.Driver");
            ConnectionURL= "jdbc:jtds:sqlserver://"+ ip + ":"+ port+";"+ "databasename="+ database+";user="+uname+";password="+pass+";";
        }
        catch (Exception ex){
            Log.e("Error", ex.getMessage());
        }
        return connection;
    }

}
