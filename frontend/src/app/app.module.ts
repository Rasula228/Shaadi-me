import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app';
import { routes } from './app.routes';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { IntakeFormComponent } from './components/intake-form/intake-form.component';

import { HomeModule } from './pages/home/home.module';
import { AboutModule } from './pages/about/about.module';
import { ContactModule } from './pages/contact/contact.module';
import { VenuesModule } from './pages/venues/venues.module';
import { WeddingsModule } from './pages/weddings/weddings.module';
import { ServicesModule } from './pages/services/services.module';
import { DestinationsModule } from './pages/destinations/destinations.module';
import { PressModule } from './pages/press/press.module';

import { LeadService } from './services/lead.service';
import { ContactService } from './services/contact.service';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    FooterComponent,
    IntakeFormComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(routes),
    HomeModule,
    AboutModule,
    ContactModule,
    VenuesModule,
    WeddingsModule,
    ServicesModule,
    DestinationsModule,
    PressModule
  ],
  providers: [
    LeadService,
    ContactService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
