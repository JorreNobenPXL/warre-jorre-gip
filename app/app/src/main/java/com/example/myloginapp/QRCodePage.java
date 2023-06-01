package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import androidmads.library.qrgenearator.QRGContents;
import androidmads.library.qrgenearator.QRGEncoder;

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
        
        Bitmap bitmap;
        QRGencoder qrgEncoder;

        QRCodeZillion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "Zillion";
                String empty = "";
                String username = intent.getStringExtra("NAME");
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(QRCodePage.this);
                backgroundWorker2.execute(url, type, username, event);



            }
        });
    }
}