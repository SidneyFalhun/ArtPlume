package com.example.artplume;



import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.ImageButton;



public class MainActivity extends Activity {
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main);
		
	    
	     final ImageButton vButStream = (ImageButton)findViewById(R.id.butstream);
	     final ImageButton contactBut = (ImageButton)findViewById(R.id.butcont);
	     final ImageButton vButIti = (ImageButton)findViewById(R.id.butart);
	     final ImageButton vButArt = (ImageButton)findViewById(R.id.butiti);
	     final ImageButton vButEvent = (ImageButton)findViewById(R.id.butevent);
	     final ImageButton vButNews = (ImageButton)findViewById(R.id.butnews);
	     final ImageButton vButInfo = (ImageButton)findViewById(R.id.butInfo);
	   
		
		// Boutton pour les evenements
		 
	       vButEvent.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentEvent = new Intent(MainActivity.this, EvenementsActivity.class);
	       		startActivity(intentEvent);
	       	}
	      
	       });
	       
	    // Boutton pour les infos
			 
	       vButInfo.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentInfo = new Intent(MainActivity.this, InfoActivity.class);
	       		startActivity(intentInfo);
	       	}
	      
	       });
	       
	       // Boutton pour le contact
	      
	       contactBut.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentContact = new Intent(MainActivity.this, ContactActivity.class);
	       		startActivity(intentContact);
	       	}
	      
	       });
	       
	   
		       
		       // Boutton pour l itineraire
		       
		       vButIti.setOnClickListener(new View.OnClickListener()
		       {
		       	public void onClick(View v)
		       	{
		       		Intent intentIti = new Intent(MainActivity.this, ItineraireActivity.class);
		       		startActivity(intentIti);
		       	}
		      
		       });
	       
	       // Boutton pour les artistes
	   
	       vButArt.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentArt = new Intent(MainActivity.this, ArtistesActivity.class);
	       		startActivity(intentArt);
	       	}
	      
	       });
	      
	       // Boutton pour le stream
	       
	       vButStream.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentStream = new Intent(MainActivity.this, StreamActivity.class);
	       		startActivity(intentStream);
	       	}
	      
	       });
	       
	    // Boutton pour la newsletter
	      
	       vButNews.setOnClickListener(new View.OnClickListener()
	       {
	       	public void onClick(View v)
	       	{
	       		Intent intentNews = new Intent(MainActivity.this, NewsletterActivity.class);
	       		startActivity(intentNews);
	       	}
	      
	       });
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	


}
