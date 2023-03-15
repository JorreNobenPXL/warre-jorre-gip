package com.example.myloginapp;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
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

import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {

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
                String url = "http://193.121.129.31/GIP-2022/validateData.php";
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
                Intent intent = getIntent();
                String Status = intent.getStringExtra("StatusLog");
                Log.d("StatusLog", Status + "Hello");
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

        // Admin and admin

        /*loginbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (username.getText().toString().equals("admin") && password.getText().toString().equals("admin")){
                    // correct
                    Toast.makeText(MainActivity.this, "Login Succesfull", Toast.LENGTH_SHORT).show();
                    openActivity2();
                }else {
                    // incorrect
                    Toast.makeText(MainActivity.this, "Login Failed", Toast.LENGTH_SHORT).show();
                }
            }
        });
*/
        signupbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity3();
            }
        });

    }

    public void statusLogValidator(boolean Status){
        if (Status = true) {
            Intent StatusLogin = new Intent(this, Activity2.class);
            Intent intent = new Intent(getApplicationContext(), MainActivity.class);
            intent.putExtra("Username", String.valueOf(usernameLog));
            startActivity(intent);
            startActivity(StatusLogin);
        } else {
            Log.d("StatusLogMain", Boolean.toString(Status));
        }

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