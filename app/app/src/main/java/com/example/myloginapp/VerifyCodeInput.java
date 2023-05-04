package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class VerifyCodeInput extends AppCompatActivity {

    EditText VerificationCode;

    Button VerifyButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_verify_code_input);

        VerificationCode = findViewById(R.id.VerifyCode);
        VerifyButton = findViewById(R.id.VerifyButton);

        Intent intent = getIntent();
        String Email = intent.getStringExtra("EMAIL");
        String GenCode = intent.getStringExtra("ID");

        VerifyButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Verifycode = VerificationCode.getText().toString();

                if (TextUtils.isEmpty(Verifycode)) {
                    Toast.makeText(VerifyCodeInput.this, "Please Enter Your Verification Code", Toast.LENGTH_SHORT).show();
                    VerificationCode.setError("Verification Code is Required");
                    VerificationCode.requestFocus();
                }else{
                    if (Verifycode.equals(GenCode)) {
                        Toast.makeText(VerifyCodeInput.this, "Code is correct, please wait", Toast.LENGTH_SHORT).show();

                    }
                }
            }
        });


    }
}