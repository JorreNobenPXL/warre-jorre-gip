package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.widget.ImageView;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.MultiFormatWriter;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.journeyapps.barcodescanner.BarcodeEncoder;

public class QRCode extends AppCompatActivity {

    ImageView GenerateQr;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_qrcode);

        GenerateQr = findViewById(R.id.GenerateQr);


        Intent intent = getIntent();
        String username = intent.getStringExtra("NAME");
        String event = intent.getStringExtra("EVENT");


        GenerateQRCode(username, event);
    }

    private void GenerateQRCode(String username, String event) {
        String text = username + event;
        MultiFormatWriter writer = new MultiFormatWriter();
        try {
            BitMatrix matrix = writer.encode(text, BarcodeFormat.QR_CODE, 900, 900);

            BarcodeEncoder encoder = new BarcodeEncoder();
            Bitmap bitmap = encoder.createBitmap(matrix);
            GenerateQr.setImageBitmap(bitmap);


        } catch (WriterException e) {
            e.printStackTrace();
        }

    }
}