package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Activity2 extends AppCompatActivity {

    TextView reciever_msg;

    Button QRCode;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_2);

        setContentView(R.layout.activity_2);

        reciever_msg = findViewById(R.id.received_value_id);
        Intent intent = getIntent();
        String username = intent.getStringExtra("NAME");
        reciever_msg.setText(username);

        QRCode = findViewById(R.id.QRCODEButton);

        QRCode.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(), QRCodePage.class);
                intent.putExtra("NAME", username);
                startActivity(intent);



            }
        });



    }
}