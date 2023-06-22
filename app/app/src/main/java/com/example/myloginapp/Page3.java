package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Page3 extends AppCompatActivity {
    Context context;

    TextView QRPrevPage;

    Button QRPreTISJ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_page3);

        QRPrevPage = findViewById(R.id.Page3Prev);
        QRPreTISJ = findViewById(R.id.PreTisjQR);

        QRPreTISJ.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "PreXMosTISJ";
                String empty = "";
                String username = intent.getStringExtra("NAME");
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(Page3.this);
                backgroundWorker2.execute(url, type, username, event);
            }
        });

        QRPrevPage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String username = intent.getStringExtra("NAME");
                Intent prev = new Intent(getApplicationContext(), page2.class);
                prev.putExtra("NAME", username);
                startActivity(prev);
            }
        });
    }
}