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

public class ForgotPassword extends AppCompatActivity {

    private Button PassResetBtn;
    private EditText PassResetEmail;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.forgot_password);

        getSupportActionBar().setTitle("Forgot Password");

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
        String to = PassResetEmail.getText().toString();
        String Subject = "Reset Code";
        String message = "Your Password Reset Code is\n code: " + Math.random();



    }
}