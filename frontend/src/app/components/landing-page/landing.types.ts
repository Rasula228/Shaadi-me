export interface HeroSlide {
  id: string;
  label: string;
  meta: string;
  video: string;
}

export interface CityCard {
  name: string;
  tagline: string;
  image: string;
  objectPosition: string;
}

export interface DecorStyleCard {
  name: string;
  shortDescription?: string;
  image: string;
  objectPosition: string;
  large?: boolean;
}

export interface ThemeCard {
  name: string;
  description: string;
  shortDescription?: string;
  priceRange?: string;
  image: string;
  objectPosition: string;
  featured?: boolean;
}

export interface WhyCard {
  number: string;
  title: string;
  description: string;
}

export interface VenueCard {
  name: string;
  description: string;
  tag: string;
  city?: string;
  capacity?: string;
  image: string;
  objectPosition: string;
}

export interface FaqItem {
  q: string;
  a: string;
}
