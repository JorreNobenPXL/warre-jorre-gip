package com.example.myloginapp;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;

public class BackgroundWorker2 extends AsyncTask<String,Void,String> {
    Context context;
    AlertDialog alertDialog;
    BackgroundWorker2(Context ctx){
        context = ctx;
    }

    @Override
    protected String doInBackground(String... params) {
        String login_url = params[0];
        String type = params[1];
        String name = params[2];
        String username = params[3];
        //String password = params[4];
        try {

            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));

            String post_data = "";
            if(type.equals("GetQR")) {
                post_data = URLEncoder.encode("username", "UTF-8") + "=" + URLEncoder.encode(name, "UTF-8") + "&"
                        + URLEncoder.encode("event", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8");
            }

            bufferedWriter.write(post_data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream, "iso-8859-1"));
            String result = "";
            String line = "";
            Log.d("help1", name);
            while ((line = bufferedReader.readLine()) != null) {
                result += line;
            }

            ArrayList<String> resultName = new ArrayList<>();
            resultName.add(result);
            resultName.add(name);
            Log.d("kanker", resultName.get(0));
            lickme(resultName);

            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            Log.d("help", result);
            return result;

        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    @Override
    protected void onPreExecute() {
        alertDialog = new AlertDialog.Builder(context).create();
        alertDialog.setTitle("Status");


    }

    protected void onPostExecute(String result) {
        //alertDialog.setMessage(result);
        //alertDialog.show();
    }
    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }

    public void LoginDialog(Context context) {
        this.context = context;
    }

    public void lickme(ArrayList<String> resultName) {
        String result = resultName.get(0);
        String name = resultName.get(1);


    }

}


