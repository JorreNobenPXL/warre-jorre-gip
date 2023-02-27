package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.button.MaterialButton;

public class MainActivity extends AppCompatActivity {

    EditText usernameLog;
    EditText passwordLog;
    EditText email;
    Button loginbtn;
    Button signupbtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        usernameLog = findViewById(R.id.username);
        passwordLog = findViewById(R.id.password);
        email = null;

        loginbtn = findViewById(R.id.login);
        signupbtn = findViewById(R.id.signup);

        loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name = usernameLog.getText().toString();
                String password = passwordLog.getText().toString();
                String Email = "";
                String url = "http://193.121.129.31/GIP-2022/validateData.php";
                String type = "login";
                BackgroundWorker backgroundWorker = new BackgroundWorker(MainActivity.this);
                backgroundWorker.execute(url, type, name, password, Email);
                Toast.makeText(MainActivity.this, "Login Succesfull \nWelcome Back " + name, Toast.LENGTH_SHORT).show();
                openActivity2();


            }
        });

        // Admin and admin

        /*loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (username.getText().toString().equals("admin") && password.getText().toString().equals("admin")){
                    // correct
                    Toast.makeText(MainActivity.this, "Login Succesfull", Toast.LENGTH_SHORT).show();
                    openActivity2();
                }else {
                    // incorrect
                    Toast.makeText(MainActivity.this, "Login Failed", Toast.LENGTH_SHORT).show();
                }
            }
        });
*/
        signupbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity3();
            }
        });

    }

    public void openActivity2() {
        Intent intent = new Intent(this, Activity2.class);
        startActivity(intent);

    }

    public void openActivity3() {
        Intent intent = new Intent(this, Activity3.class);
        startActivity(intent);
    }

}