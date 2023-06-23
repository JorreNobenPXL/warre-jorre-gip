package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class QRCodePage extends AppCompatActivity {

    Context context;

    TextView QRNextPage;
    Button QRCodeZillion;
    Button QRCodePostTisj;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_qrcode_page);
        context = getApplicationContext();

        QRNextPage = findViewById(R.id.Page1Next);
        QRCodeZillion = findViewById(R.id.ZillionQR);
        QRCodePostTisj = findViewById(R.id.PostTisjQR);

        Intent intent = getIntent();
        String username = intent.getStringExtra("NAME");
        


        QRCodeZillion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "Zillion";
                String empty = "";
                //String username = intent.getStringExtra("NAME");
                Log.d("username", username);
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(QRCodePage.this);
                backgroundWorker2.execute(url, type, username, event);
            }
        });

        QRCodePostTisj.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "PostXMosTISJ";
                String empty = "";
                //String username = intent.getStringExtra("NAME");
                Log.d("username", username);
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(QRCodePage.this);
                backgroundWorker2.execute(url, type, username, event);
            }
        });

        QRNextPage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                //String username = intent.getStringExtra("NAME");
                Intent page2 = new Intent(getApplicationContext(), page2.class);
                page2.putExtra("NAME", username);
                startActivity(page2);


            }
        });
    }
}