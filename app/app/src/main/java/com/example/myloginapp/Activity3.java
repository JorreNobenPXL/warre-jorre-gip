package com.example.myloginapp;

import static com.example.myloginapp.R.id.*;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.button.MaterialButton;

import org.w3c.dom.Text;

public class Activity3 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_3);

        TextView usernamesign = (TextView) findViewById(R.id.usernamesign);
        TextView passwordsign = (TextView) findViewById(R.id.passwordsign);
        TextView passwordconf = (TextView) findViewById(R.id.confirmPass);
        TextView email = (TextView) findViewById(R.id.email);

        MaterialButton ConfirmSignUp = (MaterialButton) findViewById(R.id.confirmsignup);

    }
}