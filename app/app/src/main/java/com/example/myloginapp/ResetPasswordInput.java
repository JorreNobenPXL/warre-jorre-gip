package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class ResetPasswordInput extends AppCompatActivity {

    EditText ResetPassword;
    EditText ConfirmResetPassword;

    Button ConfirmPassButton;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reset_password_input);

        ResetPassword = findViewById(R.id.NewPassword);
        ConfirmResetPassword = findViewById(R.id.ConfirmNewPassword);

        ConfirmPassButton = findViewById(R.id.ConfirmNewPasswordButton);

        Intent intent = getIntent();
        String email = intent.getStringExtra("EMAIL");

        ConfirmPassButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String RP = ResetPassword.getText().toString();
                String CRP = ConfirmResetPassword.getText().toString();
                String Password = "";
                String url = "http://193.121.129.31/GIP-2022/changePassword.php";
                String type = "ChangePassword";


                if (TextUtils.isEmpty(RP)) {
                    Toast.makeText(ResetPasswordInput.this, "Please enter your new password!", Toast.LENGTH_SHORT).show();
                    ResetPassword.setError("Enter a new password");
                    ResetPassword.requestFocus();
                }else{
                    if (! RP.equals(CRP)) {
                        Toast.makeText(ResetPasswordInput.this, "Passwords Don't Match!", Toast.LENGTH_SHORT).show();
                        ResetPassword.setError("Passwords Don't Match!");
                        ResetPassword.requestFocus();
                    }else{
                        if (RP.equals(CRP)) {
                            Toast.makeText(ResetPasswordInput.this, "Passwords match, please wait", Toast.LENGTH_SHORT).show();
                            BackgroundWorker backgroundWorker = new BackgroundWorker(ResetPasswordInput.this);
                            backgroundWorker.execute(url, type, RP, email, Password);

                            Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                            startActivity(intent);
                        }
                    }
                }

            }
        });

    }
}