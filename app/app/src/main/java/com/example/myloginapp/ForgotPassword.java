package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.util.Random;

public class ForgotPassword extends AppCompatActivity {

    private Button PassResetBtn;
    private EditText PassResetEmail;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.forgot_password);

        //getSupportActionBar().setTitle("Forgot Password");

        PassResetEmail = findViewById(R.id.forgotPassEmail);
        PassResetBtn = findViewById(R.id.forgotPassBtn);

        PassResetBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = PassResetEmail.getText().toString();

                if (TextUtils.isEmpty(email)) {
                    Toast.makeText(ForgotPassword.this, "Please Enter Your Registerd Email", Toast.LENGTH_SHORT).show();
                    PassResetEmail.setError("Email is required");
                    PassResetEmail.requestFocus();
                }else if (!Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
                    Toast.makeText(ForgotPassword.this, "Please Enter Your Registerd Email", Toast.LENGTH_SHORT).show();
                    PassResetEmail.setError("Email is required");
                    PassResetEmail.requestFocus();
                } else {
                    resetPassword(PassResetEmail);
                }
            }
        });
    }
    private void resetPassword(EditText PassResetEmail) {
        Random random = new Random();
        String email = PassResetEmail.getText().toString();
        String id = String.format("%04d", random.nextInt(10000));
        String password = "";

        String type = "ForgotPass";
        String url = "http://193.121.129.31/GIP-2022/forgotPassword.php";

        BackgroundWorker backgroundWorker = new BackgroundWorker(ForgotPassword.this);
        backgroundWorker.execute(url, type, email, id, password);



    }
}