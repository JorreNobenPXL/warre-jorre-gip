package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;

public class Activity2 extends AppCompatActivity {

    TextView reciever_msg;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_2);

        setContentView(R.layout.activity_2);

        reciever_msg = findViewById(R.id.received_value_id);
        Intent intent = getIntent();
        String str = intent.getStringExtra("NAME");
        reciever_msg.setText(str);
        Log.d("AIDS VLEK", str);



    }
}