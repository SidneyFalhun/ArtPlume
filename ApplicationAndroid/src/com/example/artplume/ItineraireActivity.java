package com.example.artplume;

import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.app.Activity;
import android.content.Context;


public class ItineraireActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.itineraire);
		   WebView myWebView = (WebView) findViewById(R.id.webiti);
			  
    		ConnectivityManager connMgr = (ConnectivityManager) 
  	        getSystemService(Context.CONNECTIVITY_SERVICE);
     		NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
  	    if (networkInfo != null && networkInfo.isConnected())
  	    {
  	    	myWebView.loadUrl("http://goo.gl/maps/SeBJt");
  	    }
  	    else
  	    {
  	    	myWebView.loadDataWithBaseURL(null, "<html><style type=\"text/css\"> body {color: white ;background-color: black }</style><body>Vous devez être connecté à internet pour accéder à l'application</body></html>", "text/html", "utf-8", null);
  	    }
  	    WebSettings webSettings = myWebView.getSettings();
  	    webSettings.setJavaScriptEnabled(true);
  	    myWebView.setWebViewClient(new WebViewClient());
	
	}



}