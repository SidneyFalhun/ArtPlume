package com.example.artplume;

import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.view.Menu;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class InfoActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.info);
		WebView myWebView = (WebView) findViewById(R.id.webview);
		ConnectivityManager connMgr = (ConnectivityManager) 
       	        getSystemService(Context.CONNECTIVITY_SERVICE);
          		NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
          	// On verifie si on est connecté à internet, si on est connecté à internet on affiche la page consuterInfos sinon on affiche un message d'erreur avec un webView
       	    if (networkInfo != null && networkInfo.isConnected())
       	    {
       	    	myWebView.loadUrl("http://172.20.21.100/artplume/android/?page=consulterInfos");
       	    }
    	    else
    	    {
    	    	myWebView.loadDataWithBaseURL(null, "<html><style type=\"text/css\"> body {color: white ;background-color: black }</style><body>Vous devez être connecté à internet pour accéder à l'application</body></html>", "text/html", "utf-8", null);
    	    }
       	    WebSettings webSettings = myWebView.getSettings();
       	    webSettings.setJavaScriptEnabled(true);
       	    myWebView.setWebViewClient(new WebViewClient());

	}
	


	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.info, menu);
		return true;
	}

}
