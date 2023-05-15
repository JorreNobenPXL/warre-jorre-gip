package com.example.myloginapp;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

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
import java.sql.Array;
import java.util.ArrayList;

public class BackgroundWorker extends AsyncTask<String,Void,String> {
    Context context;
    AlertDialog alertDialog;
    BackgroundWorker(Context ctx){
        context = ctx;
    }

    @Override
    protected String doInBackground(String... params) {
        String login_url = params[0];
        String type = params[1];
        String name = params[2];
        String username = params[3];
        String password = params[4];
        try {

            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));

            String post_data = "";
            if(type.equals("register")) {
                post_data = URLEncoder.encode("name", "UTF-8") + "=" + URLEncoder.encode(name, "UTF-8") + "&"
                        + URLEncoder.encode("password", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8")+ "&"
                        + URLEncoder.encode("email", "UTF-8") + "=" + URLEncoder.encode(password, "UTF-8");
            }
            else if(type.equals("login")){
                post_data = URLEncoder.encode("name", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8") + "&"
                        + URLEncoder.encode("password", "UTF-8") + "=" + URLEncoder.encode(password, "UTF-8") + "&"
                        + URLEncoder.encode("email", "UTF-8") + "=" + URLEncoder.encode(password, "UTF-8");
            }
            else if(type.equals("ForgotPass")){
                post_data = URLEncoder.encode("email", "UTF-8") + "=" + URLEncoder.encode(name, "UTF-8") + "&"
                        + URLEncoder.encode("id", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8") + "&";
            }
            else if(type.equals("ChangePassword")){
                post_data = URLEncoder.encode("password", "UTF-8") + "=" + URLEncoder.encode(name, "UTF-8") + "&"
                        + URLEncoder.encode("email", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8") + "&";
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

    @Override
    protected void onPostExecute(String result) {
        Log.d("BackStatus1", "hello");
        //Log.d("ResultBackStatus", result);
        String StatusLog = "false";
        if (result.equals("Connected Login Successful.. Welcome!")) {
            StatusLog = "true";
            Log.d("BackStatusTrue", StatusLog);
        } else if (result.equals("Connected Login not successfull")){
            StatusLog = "false";
            Log.d("BackStatusFalse", "Hello " + StatusLog);
            alertDialog.setMessage(result);
            alertDialog.show();
        }
        if (result.equals(" Username is allready in use! You have registered!")) {
            Intent Main = new Intent(context, MainActivity.class);
            context.startActivity(Main);
        }
        else if (result.equals(" Username is allready in use! User allready used")) {
            result = "Username is already in use!";
            alertDialog.setMessage(result);
            alertDialog.show();
        }
        else if (result.equals(" Username is allready in use! Email allready used!")){
            result = "Email is already in use!";
            alertDialog.setMessage(result);
            alertDialog.show();
        }

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
        Log.d("LICKME", name);
        if (result.equals("Connected Login Successful.. Welcome!")) {
            Intent Login = new Intent(context, Activity2.class);
            Login.putExtra("NAME", name);
            context.startActivity(Login);
        }
    }


}


