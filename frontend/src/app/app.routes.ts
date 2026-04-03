import { Routes } from '@angular/router';

export const routes: Routes = [
  { 
    path: '', 
    loadChildren: () => import('./pages/home/home.module').then(m => m.HomeModule) 
  },
  { 
    path: 'weddings', 
    loadChildren: () => import('./pages/weddings/weddings.module').then(m => m.WeddingsModule) 
  },
  { 
    path: 'venues', 
    loadChildren: () => import('./pages/venues/venues.module').then(m => m.VenuesModule) 
  },
  { 
    path: 'services', 
    loadChildren: () => import('./pages/services/services.module').then(m => m.ServicesModule) 
  },
  { 
    path: 'destinations', 
    loadChildren: () => import('./pages/destinations/destinations.module').then(m => m.DestinationsModule) 
  },
  { 
    path: 'about', 
    loadChildren: () => import('./pages/about/about.module').then(m => m.AboutModule) 
  },
  { 
    path: 'press', 
    loadChildren: () => import('./pages/press/press.module').then(m => m.PressModule) 
  },
  { 
    path: 'contact', 
    loadChildren: () => import('./pages/contact/contact.module').then(m => m.ContactModule) 
  },
  { path: '**', redirectTo: '' }
];
