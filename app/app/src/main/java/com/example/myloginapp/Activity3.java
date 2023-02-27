package com.example.myloginapp;

import static com.example.myloginapp.R.id.*;

import android.content.Intent;
import android.os.Bundle;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.button.MaterialButton;

import org.w3c.dom.Text;

public class Activity3 extends AppCompatActivity {

    EditText usernamesign;
    EditText passwordsign;
    EditText confirmPass;
    EditText email;
    Button confirmsignup;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_3);
        usernamesign = findViewById(R.id.usernamesign);
        passwordsign = findViewById(R.id.passwordsign);
        confirmPass = findViewById(R.id.confirmPass);
        email = findViewById(R.id.email);
        confirmsignup = findViewById(R.id.confirmsignup);

        confirmsignup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name = usernamesign.getText().toString();
                String password = passwordsign.getText().toString();
                String confirmPassword = confirmPass.getText().toString();
                String Email = email.getText().toString();
                String url = "http://193.121.129.31/GIP-2022/insertData.php";
                String type = "register";
                BackgroundWorker backgroundWorker = new BackgroundWorker(Activity3.this);
                backgroundWorker.execute(url, type, name, password, Email);
            }
        });
    }
}

    /*EditText email;
    EditText usernamesign;
    boolean EmailValid = false;
    boolean UsernameValid = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_3);

        EditText usernamesign = (EditText) findViewById(R.id.usernamesign);
        EditText passwordsign = (EditText) findViewById(R.id.passwordsign);
        EditText passwordconf = (EditText) findViewById(R.id.confirmPass);
        EditText email = (EditText) findViewById(R.id.email);


        MaterialButton ConfirmSignUp = (MaterialButton) findViewById(R.id.confirmsignup);


        ConfirmSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                emailValidator(email);
                userValidator(usernamesign);

                if (! passwordsign.getText().toString().equals(passwordconf.getText().toString())) {
                    Toast.makeText(Activity3.this, "Your Passwords are not the same!", Toast.LENGTH_SHORT).show();
                }else {
                    if (passwordsign.getText().toString().equals(passwordconf.getText().toString()) && EmailValid == true && UsernameValid == true) {
                        Toast.makeText(Activity3.this, "Sign Up Succesfull!", Toast.LENGTH_SHORT).show();
                        sendToSQL();
                        openMainForLogin();
                    } else {
                        if (EmailValid == false) {
                            Toast.makeText(Activity3.this, "Please use a valid Email!", Toast.LENGTH_SHORT).show();
                        } else {
                            if (UsernameValid == false) {
                                Toast.makeText(Activity3.this, "Please enter a Username!", Toast.LENGTH_SHORT).show();
                            }
                        }
                    }
                }
            }
        });
    }

    public void emailValidator(EditText email) {
        String emailToText = email.getText().toString();

        if (!emailToText.isEmpty() && Patterns.EMAIL_ADDRESS.matcher(emailToText).matches()) {
            EmailValid = true;
        } else {
            EmailValid = false;
        }
    }

    public void userValidator(EditText usernamesign) {
        String UserToText = usernamesign.getText().toString();

        if (!UserToText.isEmpty()) {
            UsernameValid = true;
        } else {
            UsernameValid = false;
        }
    }

    public void sendToSQL() {
        
    }

    public void openMainForLogin() {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
    }
}*/