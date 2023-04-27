package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    Context context;


    // Used to log in / Register
    EditText usernameLog;
    EditText passwordLog;
    EditText email;

    Button loginbtn;
    Button signupbtn;


    // Makes Google Logo A button to Website!
    ImageView googleLoginBtn;

    TextView forgotPasswordbtn;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        context = getApplicationContext();

        // Input of Username and Password
        usernameLog = findViewById(R.id.username);
        passwordLog = findViewById(R.id.password);
        email = null;

        // Google Button
        googleLoginBtn = findViewById(R.id.googleLogin);

        // Login and Signup button
        loginbtn = findViewById(R.id.login);
        signupbtn = findViewById(R.id.signup);

        // Forgot Password
        forgotPasswordbtn = findViewById(R.id.forgotpass);

        loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name = usernameLog.getText().toString();
                String password = passwordLog.getText().toString();
                String Email = usernameLog.getText().toString();
                //String url = "http://193.121.129.31/GIP-2022/validateData.php";
                String url = "http://127.0.0.1/GIP2023/validateData.php";
                String type = "login";
                if (TextUtils.isEmpty(name)) {
                    Toast.makeText(MainActivity.this, "Please enter username or Email!", Toast.LENGTH_SHORT).show();
                    usernameLog.setError("Username or Email is required");
                    usernameLog.requestFocus();
                } else if (TextUtils.isEmpty(password)) {
                    Toast.makeText(MainActivity.this, "Please enter your Password!", Toast.LENGTH_SHORT).show();
                    passwordLog.setError("Password is required");
                    passwordLog.requestFocus();
                } else {
                    BackgroundWorker backgroundWorker = new BackgroundWorker(MainActivity.this);
                    backgroundWorker.execute(url, type, name, password, Email);
                }

            }
        });

        googleLoginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent();
                intent.setAction(Intent.ACTION_VIEW);
                intent.addCategory(Intent.CATEGORY_BROWSABLE);
                intent.setData(Uri.parse("http://ticketscanner.iict.be/"));
                startActivity(intent);
            }
        });

        forgotPasswordbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(MainActivity.this, "Resetting Password", Toast.LENGTH_SHORT).show();
                startActivity(new Intent(MainActivity.this, ForgotPassword.class));
            }
        });
        signupbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity3();
            }
        });


    }

    /*public void statusLogValidator(String StatusLog){
        if (StatusLog.equals("true")) {
            Log.d("StatusLogMainTrue", StatusLog);
            /*usernameLog = usernameLog.findViewById(R.id.username);
            String username = usernameLog.getText().toString();
            Intent Login = new Intent(getApplicationContext(), Activity2.class);
            Login.putExtra("Username", username);
        } else if (StatusLog.equals("false")) {
            Log.d("StatusLogMainFalse", StatusLog);
            Toast.makeText(getApplicationContext(), "Username or Password incorrect", Toast.LENGTH_SHORT).show();

        }

    }*/

    public void openLoginScreen() {
        Intent intent = new Intent(getApplicationContext(), Activity2.class);
        startActivity(intent);
    }

    /*public void openActivity2(Intent passedMessage) {
        Intent intent = new Intent(this, Activity2.class);
        startActivity(intent);
    }

     */

    public void openActivity3() {
        Intent intent = new Intent(this, Activity3.class);
        startActivity(intent);
    }

}