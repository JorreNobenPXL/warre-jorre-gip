package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.graphics.pdf.PdfDocument;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.w3c.dom.Text;

public class page2 extends AppCompatActivity {

    Context context;

    TextView QRNextPage;
    TextView QRPrevPage;

    Button QRPreIKSO;
    Button QRPostHGI;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_page2);
        context = getApplicationContext();

        QRNextPage = findViewById(R.id.Page2Next);
        QRPrevPage = findViewById(R.id.Page2Prev);

        QRPreIKSO = findViewById(R.id.PreIksoQR);
        QRPostHGI = findViewById(R.id.PostHgiQR);

        QRPreIKSO.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "PreXMosIKSO";
                String empty = "";
                String username = intent.getStringExtra("NAME");
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(page2.this);
                backgroundWorker2.execute(url, type, username, event);
            }
        });

        QRPostHGI.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String url = "http://193.121.129.31/GIP-2022/getQRCode.php";
                String type = "GetQR";
                String event = "PreXMosHGI";
                String empty = "";
                String username = intent.getStringExtra("NAME");
                BackgroundWorker2 backgroundWorker2 = new BackgroundWorker2(page2.this);
                backgroundWorker2.execute(url, type, username, event);
            }
        });

        QRNextPage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String username = intent.getStringExtra("NAME");
                Intent page3 = new Intent(getApplicationContext(), Page3.class);
                page3.putExtra("NAME", username);
                startActivity(page3);


            }
        });

        QRPrevPage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                String username = intent.getStringExtra("NAME");
                Intent prev = new Intent(getApplicationContext(), QRCodePage.class);
                prev.putExtra("NAME", username);
                startActivity(prev);
            }
        });

    }
}